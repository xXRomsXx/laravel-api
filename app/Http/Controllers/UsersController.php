<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\DeleteRequest;
use App\Http\Requests\Users\ListRequest;
use App\Http\Requests\Users\ReadRequest;
use App\Http\Requests\Users\UpdateRequest;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function index(ListRequest $request)
    {
        $models = User::filter($request->all())
            ->order($request->all())
            ->paginate($request->get('items_per_page', 10))
            ->withQueryString()
        ;

        return new ResourceCollection($models);
    }

    public function get(ReadRequest $request, User $model)
    {
        return new JsonResource($model);
    }

    public function store(StoreRequest $request)
    {
        $model = new User();
        $model->password = bcrypt($request->password);
        
        return $this->handle($request, $model);
    }

    public function update(UpdateRequest $request, User $model)
    {
        return $this->handle($request, $model);
    }

    private function handle(Request $request, User $model)
    {
        $model->fill($request->all());
        $model->save();
        $model->properties()->sync($request->properties);
        $model = $model->fresh();

        return [
            'data' => new JsonResource($model),
            'message' => __('messages.success.saved')
        ];
    }

    public function delete(DeleteRequest $request, User $model)
    {
        $model->delete();
        
        return [
            'message' => __('messages.success.deleted')
        ];
    }
}
