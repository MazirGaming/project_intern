<form onclick="{{$onclick}}" id="delete-item" method="POST" action="{{$route}}" 
>

                                                        @csrf
                                                        @method('delete')
                                                        <div class="form-group">
                                                        <input type="submit" value="{{$label}}">
                                                        </div>
                                                    </form>