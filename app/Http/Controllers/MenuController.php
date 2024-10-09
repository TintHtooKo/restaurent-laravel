<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\fileExists;

class MenuController extends Controller
{
    public function addMenuPage(){
        return view('admin.menulist.addMenu');
    }

    public function addMenu(Request $request){
        $this->menuValidate($request,'add');
        $data = $this->menuData($request);

        if($request->hasFile('image')){
            $filename = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/menu', $filename);
            $data['image'] = $filename;
        }

        Menu::create($data);
        Alert::success('Success', 'Menu added successfully');
        return to_route('adminMenu');
    }

    public function deleteMenu($id){
        if(file_exists(public_path('/menu/'.Menu::find($id)->image))){
            unlink(public_path('/menu/'.Menu::find($id)->image));
        }
        $menu = Menu::find($id);
        $menu->delete();
        Alert::success('Success', 'Menu deleted successfully');
        return back();
    }

    public function editMenuPage($id){
        $menu = Menu::find($id);
        return view('admin.menulist.editMenu',compact('menu'));
    }

    public function editMenu(Request $request,$id){
        $this->menuValidate($request,'edit');
        $data = $this->menuData($request);
        if($request->hasFile('image')){
            if(file_exists(public_path('/menu/'.Menu::find($id)->image))){
                unlink(public_path('/menu/'.Menu::find($id)->image));
            }
            $filename = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path().'/menu/', $filename);
            $data['image'] = $filename;
        }else{
            $data['image'] = Menu::find($id)->image;
        }

        Menu::find($id)->update($data);
        Alert::success('Success', 'Menu updated successfully');
        return to_route('adminMenu');
    }

    private function menuValidate($request,$action){
        $rule = [
            'name' => 'required',
            'price' => 'required|numeric',
        ];

        $rule['image'] = $action == 'add' ? 'required|image|mimes:jpeg,png,jpg,webp' : 'image|mimes:jpeg,png,jpg,webp';
        $request->validate($rule);
    }

    private function menuData($request){
        return [
            'name' => $request->name,
            'price' => $request->price,
        ];
    }
}
