<div style="width: 25%;">
 
    <a class="badge bg-info text-white" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#booking-detail-modal-{{ $data->id }}"> {{ \Currency::format($data->commissionBooking->grant_total ?? 0) }}</a>

    <!-- Modal -->
    <div class="modal fade" id="booking-detail-modal-{{ $data->id }}" tabindex="-1" aria-labelledby="booking-detail-modal-{{ $data->id }}-Label" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="service-detail-modal-{{ $data->id }}-Label">Booking Details</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered m-0">
              <thead> 
                <tr>
                  <th>Sub Total</th>
                  <th>{{ \Currency::format($data->commissionBooking->sub_total ?? 0) }}</th>
                </tr>
                <tr>
                  <th>Convenience Fee</th>
                  <th>{{ \Currency::format($data->commissionBooking->convience_fee ?? 0) }}</th>
                </tr>
                <tr>
                  <th>GST({{ $data->commissionBooking->tax ?? 0 }} %)</th>
                  <th>{{ \Currency::format($data->commissionBooking->tax_amount ?? 0) }}</th>
                </tr>
                <tr>
                  <th>Additional Charge</th>
                  <th>{{ \Currency::format($data->commissionBooking->additional_charge ?? 0) }}</th>
                </tr>
                <tr>
                  <th>Grand Total</th>
                  <th>{{ \Currency::format($data->commissionBooking->grant_total ?? 0) }}</th>
                </tr>
                
              </thead>
            
               <tbody>
                   <tr>
                       <td>Transactions Type</td>
                       <td>{{ isset($data->payment->transaction_type) ? $data->payment->transaction_type : '' }}</td>
                   </tr>
                  <tr>
                    <td>Admin Amount</td>
                    <td>{{ \Currency::format(($data->commissionBooking->admin_amount ?? 0) + ($data->commissionBooking->convience_fee ?? 0) + ($data->commissionBooking->tax_amount ?? 0)) }}
                        @if(isset($data->commissionBooking->admin_payment_status) && $data->commissionBooking->admin_payment_status=='unpaid')
                            <small class="badge bg-info">Unpaid</small>
                        @elseif(isset($data->commissionBooking->admin_payment_status) && $data->commissionBooking->admin_payment_status=='paid')
                            <small class="badge bg-success">Paid</small>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Vendor Amount</td>
                    <td>{{ \Currency::format($data->commissionBooking->vendor_amount ?? 0) }}
                        @if(isset($data->commissionBooking->vendor_payment_status) && $data->commissionBooking->vendor_payment_status=='unpaid')
                            <small class="badge bg-info">Unpaid</small>
                            
                            @if (isset($data->payment->transaction_type) && $data->payment->transaction_type=='online' && $data->commissionBooking->service_status=='completed')
                            <select id="vendor_payment_status" data-modal-id="booking-detail-modal-{{ $data->id }}" data-id="{{ $data->commissionBooking->id }}" class="">
                                <option value="">Select Payment Status</option>
                                <option value="paid">Paid</option>
                            </select>
                            @endif
                            
                        @elseif(isset($data->commissionBooking->vendor_payment_status) && $data->commissionBooking->vendor_payment_status=='paid')
                            <small class="badge bg-success">Paid</small>
                        @endif
                        
                        @if(isset($data->commissionBooking->service_status) && $data->commissionBooking->service_status=='pending') 
                            <small class="ml-2 badge bg-info">Service Pending</small>
                        @elseif(isset($data->commissionBooking->service_status) && $data->commissionBooking->service_status=='completed')
                            <small class="badge bg-success">Service Completed</small>
                        @endif
                        
                    </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
 
</div>
