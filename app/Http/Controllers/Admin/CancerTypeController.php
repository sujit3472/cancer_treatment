<?php

namespace App\Http\Controllers\Admin;

use DB;
use Flash;
use Exception;
use App\User;
use App\Model\CancerType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CancerType\CreateCancerTypeRequest;
use App\Http\Requests\CancerType\UpdateCancerTypeRequest;
class CancerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objCancerType = CancerType::latest()->get();
        return view('admin.cancer-type.index', compact('objCancerType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cancer-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreateCancerTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCancerTypeRequest $request)
    {
        $requestData = $request->all();
        try {
            DB::beginTransaction();
            $objCancerType = CancerType::create($requestData);
            
            DB::commit();
            Flash::success("Cancer Type added successfully")->important();
            return redirect('admin/cancer-type');
        } catch (Exception $e) {
            DB::rollback();
            Flash::error("Oops! Something went wrong")->important();
            return redirect()->back()->withInput(request()->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objCancerType = CancerType::where('id', $id)->first();
        if(empty($objCancerType))
            return redirect('admin/cancer-type');
        return view('admin.cancer-type.edit', compact('objCancerType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateCancerTypeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCancerTypeRequest $request, $id)
    {
        $requestData = $request->all();
        try {
            DB::beginTransaction();
                $objCancerType = CancerType::updateOrCreate(['id' => $id], $requestData);
            DB::commit();
            Flash::success("Cancer Type updated successfully")->important();
            return redirect('admin/cancer-type');
        } catch (Exception $e) {
            DB::rollback();
            Flash::error("Oops! Something went wrong")->important();
            return redirect()->back()->withInput(request()->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objCancerType = CancerType::where('id', $id)->first();
        if(empty($objCancerType))
            return redirect('admin/cancer-type');

        ##check the doctor has used any type or not 
        $objUser = User::where('cancer_spacialization_id', $id)->get();
        if(!empty($objUser) && count($objUser) > 0) {
            Flash::error("Cancer Type can not be deleted because they are already used")->important();
            return redirect('admin/cancer-type');
        }

        CancerType::destroy($id);
        Flash::success("Cancer Type deleted successfully")->important();
        return redirect('admin/cancer-type');
    }
}
