        <!-- begin: Right Detail Employee -->
        <div class="col-lg-8 card-profile">
            <div class="card card-block card-stretch mb-0">
                <div class="card-header px-3">
                    <div class="header-title">
                        <h4 class="card-title">Customer Information</h4>
                    </div>
                </div>
                <div class="card-body p-3">
                    <ul class="list-inline p-0 mb-0">
                        <li class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-4">
                                    <label class="col-form-label">Name</label>
                                </div>
                                <div class="col-sm-9 col-8">
                                    <input type="text" class="form-control bg-white" value="{{ $customer->name }}" readonly>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-4">
                                    <label class="col-form-label">Email</label>
                                </div>
                                <div class="col-sm-9 col-8">
                                    <input type="text" class="form-control bg-white" value="{{ $customer->email }}" readonly>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-4">
                                    <label class="col-form-label">Phone</label>
                                </div>
                                <div class="col-sm-9 col-8">
                                    <input type="text" class="form-control bg-white" value="{{ $customer->phone }}" readonly>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-4">
                                    <label class="col-form-label">Shop Name</label>
                                </div>
                                <div class="col-sm-9 col-8">
                                    <input type="text" class="form-control bg-white" value="{{ $customer->shopname }}" readonly>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-4">
                                    <label class="col-form-label">Account Holder</label>
                                </div>
                                <div class="col-sm-9 col-8">
                                    <input type="text" class="form-control bg-white" value="{{ $customer->account_holder }}" readonly>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-4">
                                    <label class="col-form-label">Bank Name</label>
                                </div>
                                <div class="col-sm-9 col-8">
                                    <input type="text" class="form-control bg-white" value="{{ $customer->bank_name }}" readonly>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-4">
                                    <label class="col-form-label">Account Number</label>
                                </div>
                                <div class="col-sm-9 col-8">
                                    <input type="text" class="form-control bg-white" value="{{ $customer->account_number }}" readonly>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-4">
                                    <label class="col-form-label">Bank Branch</label>
                                </div>
                                <div class="col-sm-9 col-8">
                                    <input type="text" class="form-control bg-white" value="{{ $customer->bank_branch }}" readonly>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-4">
                                    <label class="col-form-label">City</label>
                                </div>
                                <div class="col-sm-9 col-8">
                                    <input type="text" class="form-control bg-white" value="{{ $customer->city }}" readonly>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-4">
                                    <label class="col-form-label">Address</label>
                                </div>
                                <div class="col-sm-9 col-8">
                                    <textarea class="form-control bg-white" readonly>{{ $customer->address }}</textarea>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: Right Detail Employee -->
