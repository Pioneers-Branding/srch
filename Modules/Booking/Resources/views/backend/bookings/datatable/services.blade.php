
<style>
/*.zoom-effect {*/
/*    overflow: hidden;*/
/*    position: relative;*/
/*}*/

.zoom-effect img {
    transition: transform 0.5s;
}

.zoom-effect:hover img {
    transform: scale(1.2);
    width: 300px; 
    height: 400px; 
}
</style>
<div style="width: 25%;">
  @if(count($data->services) > 1)
    <a class="badge bg-info text-white" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#service-detail-modal-{{ $data->id }}">Multiple</a>

    <!-- Modal -->
    <div class="modal fade" id="service-detail-modal-{{ $data->id }}" tabindex="-1" aria-labelledby="service-detail-modal-{{ $data->id }}-Label" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="service-detail-modal-{{ $data->id }}-Label">Service Details</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered m-0">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Service Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Duration (Min)</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data->services as $key => $service)
                  <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $service->service_name }}</td>
                    <td>{{ $service->quantity ?? 0 }}</td>
                    <td>{{ Currency::format($service->service_price ?? 0) }}</td>
                    <td>{{ $service->duration_min }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  @else
    <small class="badge bg-primary">{{ $data->services->first()->service_name ?? '-' }}</small>
  @endif
  
  
  @if($data->bookingCheckoutProduct->isNotEmpty())
  
  <a class="badge bg-info text-white" href="javascript:void(0)" data-bs-toggle="modal" title="view vendor used product" data-bs-target="#product-detail-modal-{{ $data->id }}">view Product</a>
  
  <div class="modal fade" id="product-detail-modal-{{ $data->id }}" tabindex="-1" aria-labelledby="product-detail-modal-{{ $data->id }}-Label" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="product-detail-modal-{{ $data->id }}-Label">Product List</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered m-0">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data->bookingCheckoutProduct as $key => $list)
                  <tr>
                    <td>{{ ++$key }}</td>
                    <td class="zoom-effect">
                        {{ $list->product->name ?? '' }} 
                        
                       
                            <img src="{{ $list->product->feature_image }}" class="zoom-img" style="width: 60px; height: 60px">
                    </td>
                    <td>{{ $list->quantity ?? 0 }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            
            @if($data->bookingCheckoutProductImages->isNotEmpty())
                <table class="table table-bordered m-0 mt-5" >
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Product Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->bookingCheckoutProductImages as $index => $image)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    {{ $image->product_name ?? '' }}
                                    <img src="{{ $image->product_image }}" class="zoom-img ml-3" style="width: 60px; height: 60px">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            
          </div>
        </div>
      </div>
    </div>
    
  
  @endif
  
</div>
