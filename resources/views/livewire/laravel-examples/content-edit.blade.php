<div>
    
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4 mt-4">
                <!-- <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Users</h5>
                        </div>
                        <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New User</a>
                    </div>
                </div> -->
                <div class="card-body px-0 pt-0 pb-2 mt-3">
                    <div class="table-responsive p-0">
                    <div class="col-xl-6 col-lg-6 col-md-6 d-flex flex-column mx-auto">
                        <form action="{{url('form-save')}}" method="POST" role="form text-left">
                                @csrf
                                <input type="hidden" name="RunID" value="{{$result->RunID}}" >
                            <div class="mb-3">
                                <label for="Q1_OName">Outlet Name</label>
                                <div class="@error('Q1_OName') border border-danger rounded-3 @enderror">
                                    <input name="Q1_OName" id="Q1_OName" type="text" class="form-control"
                                        placeholder="Outlet Name" value="{{$result->Q1_OName}}">
                                </div>
                                @error('Q1_OName') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Q1_OAddress">Address</label>
                                <div class="@error('Q1_OAddress') border border-danger rounded-3 @enderror">
                                    <input name="Q1_OAddress" id="Q1_OAddress" type="text" class="form-control"
                                        placeholder="Address" value="{{$result->Q1_OAddress}}">
                                </div>
                                @error('Q1_OAddress') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Q1_OPinCode">Pincode</label>
                                <div class="@error('Q1_OPinCode') border border-danger rounded-3 @enderror">
                                    <input name="Q1_OPinCode" id="Q1_OPinCode" type="text" class="form-control"
                                        placeholder="Pincode" value="{{$result->Q1_OPinCode}}" maxlength="6" minlength="6" onkeypress="isNumberKey(event)" >
                                </div>
                                @error('Q1_OPinCode') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Q1_OPhno">Phone No</label>
                                <div class="@error('Q1_OPhno') border border-danger rounded-3 @enderror">
                                    <input name="Q1_OPhno" id="Q1_OPhno" type="Q1_OPhno" class="form-control"
                                        placeholder="Phone No"  value="{{$result->Q1_OPhno}}" maxlength="10" minlength="10" onkeypress="isNumberKey(event)">
                                </div>
                                @error('Q1_OPhno') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="w-100">
                                
                                <button type="submit"
                                    class="btn bg-gradient-info  float-end  mt-4 mb-0">Save</button>
                                <a href="{{ route('census-dashboard') }}"
                                    class="btn bg-gradient-primary  float-end mt-4 mb-0">Cancel</a>
                            </div>
                        </form>
                            
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
       evt.preventDefault();
    
}
  
</script>
