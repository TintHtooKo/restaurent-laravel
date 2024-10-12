<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TableController extends Controller
{
    public function addTable(Request $request){
        $this->tableValidate($request);
        $data = $this->tableData($request);
        Table::create($data);
        Alert::success('Success', 'Table added successfully');
        return back();
    }

    public function deleteTable($id){
        $table = Table::find($id);
        $table->delete();
        Alert::success('Success', 'Table deleted successfully');
        return back();
    }

    public function editTablePage($id){
        $table = Table::find($id);
        return view('admin.tablelist.edit',compact('table'));
    }

    public function editTable(Request $request, $id){
        $this->tableValidate($request);
        $data = $this->tableData($request);
        Table::find($id)->update($data);
        Alert::success('Success', 'Table updated successfully');
        return to_route('adminTable');
    }

    private function tableValidate($request){
        $request->validate([
            'name' => 'required',
        ]);
    }

    private function tableData($request){
        return [
            'table_number' => $request->name,
        ];
    }
}
