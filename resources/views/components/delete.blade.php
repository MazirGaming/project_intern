<form method="POST" action="{{$route}}">
                                                        @csrf
                                                        @method('delete')
                                                        <div class="form-group">
                                                        <input type="submit" value="Xóa">
                                                        </div>
                                                    </form>