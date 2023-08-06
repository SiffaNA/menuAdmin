<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Menu;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $menus = Menu::all();
        return view('role.role', compact('roles', 'menus'));
    }

    // public function create()
    // {
    //     $menus = Menu::all();
    //     return view('role.create_role', ['menus' => $menus]);
    // }
    public function create()
    {
        $menus = Menu::all();
        return view('role.create_role', compact('menus'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'role_name' => 'required|max:255',
    //         'menu_ids' => 'required|array',
    //         'menu_ids.*' => 'exists:menus,id_menu',
    //     ]);
    
    //     $role = new Role();
    //     $role->role_name = $request->input('role_name');
    //     $role->save();
    
    //     $role->menus()->attach($request->input('menu_ids'));
    
    //     return redirect()->route('role.index')->with('success', 'Role created successfully');
    // }
    public function store(Request $request)
{
    $request->validate([
        'role_name' => 'required|max:255',
        'menu_id' => 'required|exists:menus,id_menu',
    ]);

    try {
        $role = new Role();
        $role->role_name = $request->input('role_name');
        $role->save();

        $role->menus()->attach($request->input('menu_id'));

        return redirect()->route('role.index')->with('success', 'Role created successfully');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => $e->getMessage()])->withInput();
    }
}



    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $menus = Menu::all();
        return view('role.edit_role', compact('role', 'menus'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'role_name' => 'required|max:255',
        'menu_ids' => 'required|array',
        'menu_ids.*' => 'exists:menus,id_menu',
    ]);

    $role = Role::findOrFail($id);
    $role->role_name = $request->input('role_name');
    $role->save();

    $role->menus()->sync($request->input('menu_ids'));

    return redirect()->route('role.index')->with('success', 'Role updated successfully');
}



    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Role berhasil dihapus');
    }
}
