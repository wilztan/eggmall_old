@extends('layouts.app')

@section('content')

<div class="start"></div>

@if(session('messages'))
<div class="alert alert-success" role="alert">{{session('messages')}}</div>
@endif

{{-- Slider --}}
<div id="carousel-id" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel-id" data-slide-to="0" class=""></li>
    <li data-target="#carousel-id" data-slide-to="1" class=""></li>
    <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item">
      <img src="{{ asset('public/images/main.gif') }}">
      <div class="container">
        <div class="carousel-caption">
          <h1>Example headline.</h1>
          <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
        </div>
      </div>
    </div>
    <div class="item">
      <img src="{{ asset('public/images/main.gif') }}">
      <div class="container">
        <div class="carousel-caption">
          <h1>Another example headline.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
        </div>
      </div>
    </div>
    <div class="item active">
      <img src="{{ asset('public/images/main.gif') }}">
        <div class="carousel-caption">
          <h1>One more for good measure.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- End of Carousel --}}

{{-- About --}}
<div class="about">
  <div class="container">
    <h1>Welcome to EGGMALL</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
</div>
{{-- End of About --}}

{{-- Style --}}
<div class="style-fashion">
  <div class="row">
    <div class="col-md-6 col-fashion">
      <img class="image-fashion" src="{{ asset('public/images/male.png') }}">
    </div>
    <div class="col-md-6 col-fashion">
      <img class="image-fashion" src="{{ asset('public/images/female.png') }}">
    </div>
  </div>
</div>
{{-- End of Style --}}

{{-- Item  --}}
<div class="item container">
  <h1>Shop With Us More</h1>
  <div class="row">
    @if($data==null)
      <h3 style="text-align: center">No Item Sold</h3>
    @else
    @foreach($data as $product)
      <div class="col-md-3">
        <div class="card">
          <img class="item-images" src="{{ asset($product->imgUrl) }}" alt="Avatar" style="width:100%">
          <div class="container item-content">
            <h4><b>@if(strlen($product->name) > 20) {{ substr($product->name, 0, 17) . '...'}}@else{{$product->name}}@endif</b></h4> 
            <p>stock : {{$product->stock}}<br>price : {{$product->price}}</p>
            <a class="btn btn-primary" data-toggle="modal" href='#modal-{{$product->id}}'>About</a>
            @if(Auth::Check())
              @if(Auth::User()->id!=$product->user_id)
              <a class="btn btn-primary" data-toggle="modal" href='#modal-buy{{$product->id}}'>Buy Item</a>
              @else
              <small><br>You Can't Buy Your Own Item</small>
              @endif
              <div class="modal fade" id="modal-buy{{$product->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                  {!! Form::open([
                    'method'=>'POST',
                    'action'=>'TransactionController@store',
                    'role'=>'form',
                    ]) !!}
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Buy Item</h4>
                    </div>
                    <div class="modal-body">
                      
                        <div class="form-group">
                          <label for="">Item Name</label>
                          <input type="text" class="form-control" id="" placeholder="Input field" disabled="true" value="{{$product->name}}">
                        </div>
                      
                        
                        <div class="form-group">
                          <label for="">Item Price</label>
                          <input type="text" class="form-control" id="" placeholder="Input field" disabled="true" value="{{$product->price}}">
                        </div>

                        <div class="form-group">
                          <label for="">Quantity</label>
                          <input type="number" class="form-control" id="" placeholder="Input field" name="qty" max="{{$product->stock}}" required="true">
                        </div>

                        {!! Form::token() !!}
                        <input type="hidden" name="item_id" value="{{$product->id}}">
                        Please Transfer to {{Auth::User()->payment}}
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Buy Now</button>
                    </div>
                  {!! Form::close() !!}
                  </div>
                </div>
              </div>
            @else
              <a class="btn btn-primary" data-toggle="modal" href='#modal-buy{{$product->id}}'>Buy Now</a>
              <div class="modal fade" id="modal-buy{{$product->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Please Log In / Register First</h4>
                    </div>
                    <div class="modal-body">
                      Please Log In / Register to continue to our purchase page, More items and feature are waiting for you!
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <a type="button" class="btn btn-primary" href="{{ url('/login') }}">Login</a>
                      <a type="button" class="btn btn-primary" href="{{ url('/register') }}">Register</a>
                    </div>
                  </div>
                </div>
              </div>
            @endif
            
            <div class="modal fade" id="modal-{{$product->id}}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">{{$product->name}}</h4>
                  </div>
                  <div class="modal-body">
                    <img src="{{ asset($product->imgUrl) }}" alt="Avatar" style="width:100%">
                    <h3>Stock : {{$product->stock}}
                      <br>Price : {{$product->price}}
                      <br>Seller : {{App\User::find($product->user_id)->name}}
                    </h3>
                    <p>{{$product->desc}}</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    @endforeach
    @endif
  </div>

  <div align="center">
    <div  class="pagination"> {{ $data->render() }} </div>
  </div>
</div>
{{-- end of item --}}

{{-- footer --}}
<div class="footer">
  <div class="row">
    <div class="col-md-6 footer-content container">
      <h3>Shop More With Us</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <br><br>
      <i class="fa fa-facebook"></i>
      <i class="fa fa-instagram"></i>
      <i class="fa fa-twitter"></i>
      <i class="fa fa-phone"></i>
      <i class="fa fa-envelope"></i>
    </div>

    <div class="col-md-2"></div>

    <div class="col-md-4 map">
      <div id="map"></div>
    </div>
  </div>
</div>
{{-- end of footer --}}


@endsection

@section('footer')
<script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRgmB7NzkyOrzXtuO5XrYY7ckiAbKJcHI&callback=initMap"
    async defer></script>
@endsection