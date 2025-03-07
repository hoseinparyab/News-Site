<?php

namespace PYB\Role\Http\Controllers;

use PYB\Role\Http\Requests\RoleRequest;
use PYB\Role\Models\Role;
use PYB\Role\Repositories\PermissionRepo;
use PYB\Role\Repositories\RoleRepo;
use PYB\Role\Services\RoleService;
use PYB\Share\Http\Controllers\Controller;

class RoleController extends Controller
{
    public RoleRepo $repo;
    public RoleService $service;

    public function __construct(RoleRepo $roleRepo, RoleService $roleService)
    {
        $this->repo = $roleRepo;
        $this->service = $roleService;
    }

    public function index()
    {
        $this->authorize('index', Role::class);
        $roles = $this->repo->index()->paginate(10);

        return view('Role::index', compact('roles'));
    }

    public function create(PermissionRepo $permissionRepo)
    {
        $this->authorize('index', Role::class);
        $permissions = $permissionRepo->all();

        return view('Role::create', compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        $this->authorize('index', Role::class);
        $this->service->store($request);

        alert()->success('ساخت مقام', 'مقام با موفقیت ساخته شد');
        return to_route('roles.index');
    }

    public function edit($id, PermissionRepo $permissionRepo)
    {
        $this->authorize('index', Role::class);
        $role = $this->repo->findById($id);
        $permissions = $permissionRepo->all();

        return view('Role::edit', compact(['role', 'permissions']));
    }

    public function update(RoleRequest $request, $id)
    {
        $this->authorize('index', Role::class);
        $this->service->update($request, $id);

        alert()->success('ویرایش مقام', 'مقام با موفقیت ویرایش شد');
        return to_route('roles.index');
    }

    public function destroy($id)
    {
        $this->authorize('index', Role::class);
        $this->repo->delete($id);

        alert()->success('حذف مقام', 'مقام با موفقیت حذف شد');
        return to_route('roles.index');
    }
}
