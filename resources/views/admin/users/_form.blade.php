
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Họ và tên</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name ?? old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Số điện thoại</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone ?? old('phone') }}">
                                            @error('phone')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Email</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email ?? old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Mật khẩu</label>
                                        <div class="col-md-10">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                            @error('password')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-10">
                                            <input type="hidden" class="form-control" name="type">
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>