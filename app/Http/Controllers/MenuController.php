<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    public function index()
    {
        $masterMenus = Menu::leftJoin('menus as menu_sub', 'menus.menu_sub', '=', 'menu_sub.id_menu')
            ->select('menu_sub.Menu_name as submenu_name', 'menus.*')
            ->get();
        return view('menu.index', compact('masterMenus'));
    }

    public function create()
    {
        $masterMenus = Menu::select('*')->where('menu_category', 'master menu')->get();
    return view('menu.create', compact('masterMenus'));
    }

    public function edit($id)
    {
        $masterMenus = Menu::findOrFail($id);
        $masterMenus = Menu::where('menu_category', 'master menu')->get();
        return view('menu.edit', compact('masterMenus'));
    }
    
    public function update(Request $request, $id)
    {
        $menuCategory = $request->menu_category;
        $menuSub = $menuCategory === 'master menu' ? null : $request->menu_sub;
        Menu::where('id_menu', $id_menu)->update([
            'menu_name' => $request->menu_name,
            'menu_link' => $request->menu_link,
            'menu_category' => $menuCategory,
            'menu_sub' => $menuSub,
            'menu_position' => $request->menu_position,
            'updated_at' => now(),
        ]);
    
        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui');
    }
    
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus');
    }

    public function store(Request $request)
{
    $menuCategory = $request->menu_category;
    $menuSub = $menuCategory === 'master menu' ? null : $request->menu_sub;
    $result = Menu::insert([
        'menu_name' => $request->menu_name,
        'menu_link' => $request->menu_link,
        'menu_category' => $menuCategory,
        'menu_sub' => $menuSub,
        'menu_position' => $request->menu_position,
        'create_at' => now(),
        'updated_at' => now(),
    ]);
    if ($result){
        return redirect()->route('menu.index');
    }else{
        return $this->create();
    }
}

}
