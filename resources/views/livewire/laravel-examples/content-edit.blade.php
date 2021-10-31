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
                    <div class="p-0">
                    <div class="col-xl-6 col-lg-6 col-md-6 d-flex flex-column mx-auto">
                        <form action="{{url('form-save')}}" method="POST" role="form text-left">
                                @csrf
                                <input type="hidden" name="RunID" value="{{$result->RunID}}" >
                          
                            @foreach($quest_prop as $prop)
                               
                                    <div class="mb-3">
                                        <label for="Q1_OName">{{$prop->Q_text}}</label>
                                        <div class="@error('Q1_OName') border border-danger rounded-3 @enderror">
                                            @if($prop->Q_type == 1)
                                                @if($prop->Q_opt_type == 1)
                                                    <select name="{{$prop->Q_name}}" class="form-control">
                                                        <option value="0">Please Select</option>
                                                        @foreach(json_decode($prop->options) as $key=>$option)
                                                            @if($result[$prop->Q_name] == $key)
                                                                <option selected value="{{$key}}">{{$option}}</option>
                                                            @else
                                                                <option value="{{$key}}">{{$option}}</option>    
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                 @else
                                                    @foreach(json_decode($prop->options) as $key=>$option)
                                                    <div class="form-check form-check-info text-left">
                                                         <input class="form-check-input" name="{{$prop->Q_name}}[]" type="checkbox" value="{{str_pad($key,$prop->Qzeropad_len,'0',STR_PAD_LEFT)}}" id="{{$prop->Q_name}}_{{$key+1}}"
                                                        >
                                                        <label class="form-check-label" for="{{$prop->Q_name}}_{{$key+1}}">
                                                            {{$option}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                @endif
                                            @elseif($prop->Q_type == 2)
                                                <input name="{{$prop->Q_name}}" id="{{$prop->Q_name}}" type="text" class="form-control"
                                                placeholder="Outlet Name" value="{{$result[$prop->Q_name]}}">
                                            @endif
                                        </div>
                                      
                                    </div>
                            @endforeach
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

