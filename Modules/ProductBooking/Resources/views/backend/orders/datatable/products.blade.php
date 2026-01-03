<div style="width: 25%;">
  @if(count($data->products) > 1)
    <a class="badge bg-info text-white" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#service-detail-modal-{{ $data->id }}">Multiple</a>

     @else
    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#service-detail-modal-{{ $data->id }}"><small class="badge bg-primary" >{{ $data->products->first()->product_name ?? '-' }}</small> </a>
  @endif
  
  <!-- Modal -->
    <div class="modal fade" id="service-detail-modal-{{ $data->id }}" tabindex="-1" aria-labelledby="service-detail-modal-{{ $data->id }}-Label" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="service-detail-modal-{{ $data->id }}-Label">Product Details</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered m-0">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Product Name</th>
                  <th>Qty</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data->products as $key => $service)
                  <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $service->product_name }}</td>
                    <td>{{ $service->quantity ?? 0 }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
 
</div>
