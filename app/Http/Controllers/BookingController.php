<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{

    public function bookingList(){
        $booking = Booking::select('tables.table_number as table_name','bookings.make_as_read','bookings.id','bookings.name','bookings.email','bookings.phone','bookings.datetime','bookings.no_of_guest','bookings.created_at')
                            ->leftJoin('tables','bookings.table_id','tables.id')
                            ->orderBy('id','desc')
                            ->get();
        return view('admin.bookinglist.booking',compact('booking'));
    }
 
    public function booking(Request $request){
        if(Auth::check()){
            $this->bookingValidate($request);
            $isBooked = Booking::where('table_id', $request->table)
                ->whereDate('datetime', Carbon::parse($request->datetime)->format('Y-m-d'))
                ->exists();

            if ($isBooked) {
                Alert::error('Error', 'This table is already booked for the selected date.');
                return back();
            }
            
            $data = $this->bookingData($request);
            Booking::create($data);

            Alert::success('Success', 'Booking added successfully');
            return back();
        }else{
            Alert::error('Error','Please login first');
            return back();
        }
    }

    public function bookingEditPage($id){
        $booking = Booking::select('tables.table_number as table_name','bookings.id','bookings.name','bookings.email','bookings.phone','bookings.datetime','bookings.no_of_guest','bookings.make_as_read','bookings.created_at')
                            ->leftJoin('tables','bookings.table_id','tables.id')
                            ->find($id);
        return view('admin.bookinglist.editBooking',compact('booking'));
    }

    public function bookingEdit(Request $request, $id){
        dd($request->all());
    }

    private function bookingValidate($request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'datetime' => 'required',
            'guest' => 'required|numeric',
            'table' => 'required',
        ]);
    }

    private function bookingData($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'datetime' => $request->datetime,
            'no_of_guest' => $request->guest,
            'table_id' => $request->table,
        ];
    }
}
