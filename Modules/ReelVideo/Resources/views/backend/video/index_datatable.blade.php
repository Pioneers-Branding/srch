@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('modules/reelvideo/style.css') }}">
@endpush

@section('content')
<div class="card">
    <div class="card-body">

        <x-backend.section-header>

            <x-slot name="toolbar">
              <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" class="form-control dt-search" placeholder="Search..." aria-label="Search" aria-describedby="addon-wrapping">
              </div>
              @hasPermission('add_videos')
              <x-buttons.offcanvas target='#form-offcanvas' class="create_btn" title="{{ __('messages.create') }} {{ __($module_title) }}">{{ __('messages.create') }} {{ __($module_title) }}</x-buttons.offcanvas>
              @endhasPermission
            </x-slot>
            </x-backend.section-header>
            <table id="datatable" class="table table-striped border table-responsive">
            </table>
        </div>
      </div>
      <div data-render="app">
        <video-form-offcanvas
             create-title="{{ __('messages.create') }} {{ __('messages.new') }} {{ __($module_title) }}"
             edit-title="{{ __('messages.edit') }} {{ __($module_title) }}">
        </video-form-offcanvas>

       </div>

@endsection

@push ('after-styles')
<!-- DataTables Core and Extensions -->
<link rel="stylesheet" href="{{ asset('vendor/datatable/datatables.min.css') }}">

@endpush

@push ('after-scripts')
<!-- DataTables Core and Extensions -->
<script type="text/javascript" src="{{ asset('vendor/datatable/datatables.min.js') }}"></script>


<script src="{{ asset('modules/reelvideo/script.js') }}"></script>
<script src="{{ asset('js/form-offcanvas/index.js') }}" defer></script>

<script type="text/javascript">

        const columns = [
        {
                name: 'check',
                data: 'check',
                title: '<input type="checkbox" class="form-check-input" name="select_all_table" id="select-all-table" onclick="selectAllTable(this)">',
                width: '15%',
                exportable: false,
                orderable: false,
                searchable: false,
        },
        { data: 'question', name: 'question', title: "{{ __('Question') }}", width:'30%'},
        { data: 'options', name: 'options', title: "{{ __('Options') }}", width:'30%'},
        { data: 'correct_answer', name: 'correct_answer', title: "{{ __('Correct Answer') }}", width:'30%'},
        { data: 'status', name: 'status', title: "{{ __('slider.lbl_status') }}", width:'15%'},
        {
            data: 'updated_at',
            name: 'updated_at',
            title: "{{ __('Updated at') }}",
            width: '15%',
            visible: true,
        },

      ]

      const actionColumn = [
            { data: 'action', name: 'action', orderable: false, searchable: false, title: "{{ __('slider.lbl_action') }}"}
        ]

        const customFieldColumns = JSON.parse(@json($columns))

        let finalColumns = [
            ...columns,
            ...customFieldColumns,
            ...actionColumn
        ]

        document.addEventListener('DOMContentLoaded', (event) => {
            initDatatable({
                url: '{{ route("backend.$module_name.index_data") }}',
                finalColumns,
                // orderColumn: [[ 6, "desc" ]],   
            })
        })


      function resetQuickAction () {
      const actionValue = $('#quick-action-type').val();
      if (actionValue != '') {
          $('#quick-action-apply').removeAttr('disabled');

          if (actionValue == 'change-status') {
              $('.quick-action-field').addClass('d-none');
              $('#change-status-action').removeClass('d-none');
          } else {
              $('.quick-action-field').addClass('d-none');
          }
      } else {
          $('#quick-action-apply').attr('disabled', true);
          $('.quick-action-field').addClass('d-none');
      }
    }

    $('#quick-action-type').change(function () {
      resetQuickAction()
    });


    function resetForm(){
        $('#video').val('');
        $('#thumbnail').val('');
        $('#name').val('');
    }
    var video_id = '';

    //$(document).on('click', '.edit_btn', function (e) {
       // e.preventDefault(); 
        
        //var video_id = $(this).data('crud-id');
        //var name = $(this).data('name');
        //var status = $(this).data('status') == 1; 
        
        //setTimeout(function() {
            //$('#name').val(name);
            ///$('#slider-status').prop('checked', status);
            
        ///}, 2000);
    //});



    // $(document).on('click', '.create_btn', function (e) {
    //       video_id= '';
    //       resetForm();
    // });
      
      
    // $(document).on('submit', '#video_form', function (e) {
    //     e.preventDefault();

    //     var formData = new FormData($('#video_form')[0]);
    //     formData.append('id', video_id)

    //         $.ajax({
    //             url: "{{ route('backend.videos.store') }}",
    //             type: 'POST', 
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             data: formData,
    //             contentType: false,
    //             processData: false,
    //             dataType: 'json',
    //             success: function(res) {
    //               if (res.status) {
    //                   resetForm();
    //                 window.successSnackbar(res.message);
    //                 renderedDataTable.ajax.reload(null, false);
    //                 bootstrap.Offcanvas.getInstance('#form-offcanvas').hide();
    //                 setFormData(defaultData());
    //                 removeImage();
                    
    //               } else {
    //                 window.errorSnackbar(res.message);
    //                 errorMessages.value = res.all_message;
    //               }
    //             },
    //             error: function(error) {
    //                 console.log(error);
    //             }
    //         }); 

    //         e.stopPropagation();


    // });

  </script>
@endpush
