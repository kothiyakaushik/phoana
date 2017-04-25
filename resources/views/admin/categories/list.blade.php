@extends('layouts.backend')

@section('title','Service Main Categories')

@section('body-class','hold-transition skin-blue sidebar-mini')

@push('header')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('/public/backend/plugins/datatables/dataTables.bootstrap.css')}}">
@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Main Category Listing
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <div class="pull-right">
              <a href="{{route('getAdminAddnewCategory',Request::all())}}" class="btn btn-primary pull-right">Add New</a>
            </div>
          </div>

          <div class="box-body">
            @if(Session::has('message') || $errors->any())
                <!-- Display Session Message  -->
                  @include('admin.myerrorSection')
            @endif
            <div class="form-group">
              {{Form::open(array('method' => 'get','class'=>'','id'=>"myform",'name'=>"myform"))}}  
            
                <div class="form-group pull-right">
                  <div class="input-group">
                    <input type="text" class="form-control" name="search" id="search" value="{{Request::get('search')}}" />
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-default">Search</button>
                    </span>
                  </div>
                </div>
              {{Form::close()}}    
          
              {{Form::open(array('url' => route('postAdminListCategory'), 'method' => 'post','class'=>'row'))}}  
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <div class="input-group">
                      <!-- 'deleted' => 'Delete', -->
                      {{Form::select('bulkaction', array('active' => 'Active','inactive' => 'Inactive'),null, ['placeholder' => '--Select Action--','class'=>'form-control','id'=>'bulkaction'])}}
                      <span class="input-group-btn">
                        <button type="submit" name="submit" id="bulkSubmit" value="Apply" class="btn btn-default">Apply</button>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  Show <select id="recordsPerPage" data-target="category-listing">
                    @foreach($recordsPerPage as $perPage)
                      @if($perPage==0)
                        <option value="0">All</option>
                      @else
                        <option value="{{$perPage}}" {{(session()->get("category-listing") == $perPage) ? 'selected' : ''}}>{{$perPage}}</option>
                      @endif
                    @endforeach
                  </select> entries

                  @if($isRequestSearch)
                    <a href="{{route('getAdminListCategories')}}" class="pull-right btn btn-danger btn-sm">Reset Search </a>
                  @endif

                  <br/><br/>
                  <table class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">{{Form::checkbox('colcheckbox', '',null, ['class'=>'selectall'])}}</th>
                        <th class="text-center">Display order</th>
                        <th>Category Name <a href="{{route('getAdminListCategories', $sort_columns['category_name']['params'])}}"><i class="fa fa-angle-{{$sort_columns['category_name']['angle']}}"></i></a></th>
                        <th>Image</th>
                        <th>Active/Inactive <a href="{{route('getAdminListCategories', $sort_columns['active']['params'])}}"><i class="fa fa-angle-{{$sort_columns['active']['angle']}}"></i></a></th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>

                    @if(count($allCategories)!=0)
                      @foreach($allCategories as $category)
                        <tr data-raw_id="{{$category->id}}" data-orderno="{{$category->category_order}}">
                          <td class="text-center">{{Form::checkbox('selectedIds[]', $category->id,null, ['class'=>'userRow','id'=>'selectedIds'])}}</td>
                          <td class="text-center">
                            <button type="button" data-order="up" class="btn btn-secondary bg-green btn-xs btn-status change_order" data-toggle="tooltip" data-placement="top"
                              title="Move up">
                              <i class="fa fa-chevron-up"></i>
                            </button>

                            <button type="button" data-order="down" class="btn btn-secondary bg-green btn-xs btn-status change_order" data-toggle="tooltip" data-placement="top"
                              title="Move down">
                              <i class="fa fa-chevron-down"></i>
                            </button>
                          </td>
                          <td>
                            <a  href="{{route('getAdminEditCategory',array_merge( ['Category'=> $category->id ], Request::all()) )}}">{{$category->category_name}}</a>
                          </td>
                          <td>
                            <img src="{{route('get-image-resize', ['image'=>($category->category_image) ? $category->category_image : 'null','path'=>'category'])}}" class="img-responsive" height="50px" width="50px">
                          </td>
                          <td>
                            @if($category->active == 1)
                                <button type="button" class="btn btn-secondary bg-green btn-xs btn-status"
                                    data-toggle="tooltip" data-placement="top" title="Click to Inactivate"
                                      data-status="1" data-row_id="{{$category->id}}" data-table_name="categories">
                                Active
                              </button>
                            @else
                                <button type="button" class="btn btn-secondary bg-red btn-xs btn-status" 
                                      data-toggle="tooltip" data-placement="top" title="Click to Activate"
                                        data-status="0" data-row_id="{{$category->id}}" data-table_name="categories">
                                Inactive
                              </button>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('getAdminEditCategory',array_merge( ['Category'=> $category->id ], Request::all()) )}}" class="btn-success btn-sm">Edit</a>
                            
                            <a onclick="return confirmDelete(event);" href="{{route('getAdminDeleteCategory',array_merge( ['Category'=> $category->id], Request::all()) )}}" class="btn-danger btn-sm">Delete</a>
                          </td>
                        </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="6" class="text-center">No record(s) found.</td>
                      </tr>
                    @endif

                    @if(count($allCategories) > 0)
                    <tfoot>
                      <tr>
                        <td colspan=6 class="text-center">

                          {{$allCategories->appends(['search'=>Request::get('search'),'sortBy'=>Request::get('sortBy'),'sortOrder'=>Request::get('sortOrder')])->render()}}
                        </td>
                      </tr>
                    </tfoot>
                      
                    @endif
                    </tbody>
                  </table>
                </div>
              {{Form::close()}}
            </div>
          <!-- /.box-body -->
          </div>
        <!-- /.box -->
        </div>
      <!-- /.col -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endsection

@push('footer')
  <script src="{{asset('/public/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('/public/backend/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">
    $(document).on("click",".change_order", function(e){
        
        var currentTrObject = $(this).parent().parent();
        
        var currentRawId    = currentTrObject.data("raw_id");
        var currentOrderNo  = currentTrObject.data("orderno");
        var currentRaw      = currentTrObject.closest('tr');
        var moveOrder       = $(this).data('order');
        
        var swapOrderNo = "";
        var swapId      = "";
        if(moveOrder == "up"){
            //swapOrderNo = currentRaw.prev().data("order-no");
            swapId      = currentRaw.prev().data("raw_id");
        }
        if(moveOrder == "down"){
            //swapOrderNo = currentRaw.next().data("order-no");
            swapId      = currentRaw.next().data("raw_id");
        }

        $.ajax({
            url : "{{route('postAdminChangeCategoryOrder')}}",
            type: "post",
            data:{
                currentRawId  : currentRawId,
                currentOrderNo: currentOrderNo,
                swapId        : swapId,
                //swapOrderNo   : swapOrderNo,
                moveOrder     : moveOrder,
                _token        : "{{csrf_token()}}"
            },
            success:function(data){
                if(data == 1)
                {
                    if(moveOrder == "up")
                    {
                        currentTrObject.data("orderno",currentOrderNo-1);
                        currentRaw.prev().data("orderno",currentOrderNo);
                        currentTrObject.insertBefore(currentTrObject.prev());
                    }
                    if(moveOrder == "down")
                    {
                        currentTrObject.data("orderno",currentOrderNo+1);
                        currentRaw.next().data("orderno",currentOrderNo);
                        currentTrObject.insertAfter(currentTrObject.next());
                    }
                }
            }

        });
    });
  </script>
@endpush