<div class="d-flex gap-2 align-items-center">
  @hasPermission('service_step')
    <button type='button' data-step-module="{{ $data->id }}" data-step-target='#service-step-form' data-step-event='service_step' class='btn btn-soft-primary btn-sm rounded text-nowrap d-none' data-bs-toggle="tooltip" title="{{ __('Service Step') }}"><i class="fa-solid fa-plus"></i></button>
  @endhasPermission
  
  @hasPermission('service_gallery')
    <button type='button' data-gallery-module="{{ $data->id }}" data-gallery-target='#service-gallery-form' data-gallery-event='service_gallery' class='btn btn-soft-info btn-sm rounded text-nowrap d-none' data-bs-toggle="tooltip" title="{{ __('messages.gallery_for_service') }}"><i class="fa-solid fa-images"></i></button>
  @endhasPermission
  @hasPermission('edit_service')
      <button type="button" class="btn btn-soft-primary btn-sm edit_btn" data-url="{{ route('backend.services.update' , [$data->id]) }}" data-crud-id="{{$data->id}}" title="{{ __('messages.edit') }} " data-bs-toggle="tooltip"> <i class="fa-solid fa-pen-clip"></i></button>
  @endhasPermission
  @hasPermission('delete_service')
      <a href="{{route("backend.$module_name.destroy", $data->id)}}" id="delete-{{$module_name}}-{{$data->id}}" class="btn btn-soft-danger btn-sm" data-type="ajax" data-method="DELETE" data-token="{{csrf_token()}}" data-bs-toggle="tooltip" title="{{__('messages.delete')}}" data-confirm="{{ __('messages.are_you_sure?') }}"> <i class="fa-solid fa-trash"></i></a>
  @endhasPermission
</div>
