@extends('layouts.app')

@section('content')

<div class="w-90 container-fullwidth mx-5 mt-4">
  <div class="card">
    <div class="card-header">
      <span class="font-weight-bold">Order Info</span>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col col-md-4">
          <p hidden class=" card-text"><span class="font-weight-bold">id:-</span> {{$order->id}}</p>
          <p class=" card-text"><span class="font-weight-bold">order user name:-</span> {{$order->user ?$order->user->type->name : 'no owner'}}</p>
          <p class=" card-text"><span class="font-weight-bold">doctor name:-</span> {{$order->doctor ?$order->doctor->type->name : 'no doctor' }}</p>
          <p class=" card-text"><span class="font-weight-bold">delivering address:-</span> {{$order->delivering_address}}</p>
          <p id="order_status" class=" card-text"><span class="font-weight-bold">status:-</span> {{$order->status}}</p>
          <p class=" card-text"><span class="font-weight-bold">creator type:-</span> {{$order->creator_type}}</p>
          <p class=" card-text"><span class="font-weight-bold">assigned pharmacy name:-</span> {{$order->pharmacy?$order->pharmacy->type->name:'not yet'}}</p>
          <p class=" card-text"><span class="font-weight-bold">price-</span> {{$order->price}}</p>
          <p class=" card-text"><span class="font-weight-bold">is insured:-</span> {{$order->is_insured == 1 ? 'YES':'NO'}}</p>
          <p class=" card-text"><span class="font-weight-bold">created at:-</span> {{$order->created_at}}</p>
          <p class=" card-text"><span class="font-weight-bold">updated at:-</span> {{$order->updated_at}}</p>
          <p class=" card-text"><span class="font-weight-bold">Medicines</span> </p>
          <ul class="list-group" id="medlist">
            @foreach ($order->medicines as $med)
            <li class="list-group-item">{{$med->name}} qty {{$med->pivot->quantity}}</li>
            @endforeach
          </ul>
          @if($order->status=="New" || $order->status=="Processing")
          <button id="addmedbtn" class="btn btn-success" id="medicine">add Medicine</button>
          @endif
        </div>
        <div class="col col-md-8">
          <h3><strong>Prescription</strong></h3>
          <div class="row">
            @foreach ($order->images as $image)
            <div class="col col-md-6">
              <img class="{{$image->id}} PrescriptionImage" style="cursor: pointer;" src="{{ URL::to('/') }}/images/{{$image->image}}">
            </div>
            @endforeach
          </div>
        </div>
      </div>

    </div>
    <div id="finishdev" class=" {{$order->medicines->isNotEmpty()? 'not allowed':''}}">

    </div>
    @if($order->medicines->isNotEmpty()&& $order->status=="Processing")

    <button class="text-center btn btn-danger finish"> finish & Notify Client</button>
    @endif
    <div id="waitingdev">
      @if($order->medicines->isNotEmpty()&& $order->status=="Waiting")
      <button class="text-center btn btn-success disabled"> waiting for client</button>
      @endif
    </div>

    @if($order->medicines->isNotEmpty()&& $order->status=="Confirmed")
    <form action="/order/{{$order->id}}">
      <input class="text-center btn btn-success" value="Deliver to user">
      @method('put')
    </form>
    @endif
  </div>

</div>
<div id="medicineForm" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Medicine</h4>
      </div>
      <div class="modal-body">
        <span id="form_result"></span>
        <form method="post" id="sample_form" autocomplete="off" class="form-horizontal ">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4">name</label>
            <div class="col-md-8">
              <input type="text" name="name" id="name" class="form-control" list="medi" />
              <datalist id="medi">

              </datalist>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4">Quantity </label>
            <div class="col-md-8">
              <input type="text" name="quantity" id="quantity" class="form-control" />
            </div>
          </div>
          <div class="pricediv form-group">
            <label class="control-label col-md-4">type </label>
            <div class="col-md-8">
              <input type="text" name="type" id="type" class="form-control" />
            </div>
          </div>
          <div class="pricediv form-group">
            <label class="control-label col-md-4">Price </label>
            <div class="col-md-8">
              <input type="text" name="price" id="price" class="form-control" />
            </div>
          </div>
          <br />
          <div class="form-group" align="center">
            <input type="hidden" name="hidden_id" id="hidden_id" value="{{$order->id}}" />
            <input type="hidden" name="status" id="status" value="use" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<div id="Prescription" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Prescription</h4>
      </div>
      <div class="modal-body PrescriptionModal">

      </div>
    </div>
  </div>
</div>




<script>
  $(document).ready(function() {
    $('.pricediv').hide();
    $(document).on('click', '#addmedbtn', function() {
      console.log("clicked");

      $('#medicineForm').modal('show');

    });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#name').keyup(function() {

      $('#medi').empty();
      var query = $(this).val();
      if (query != '') {
        $.ajax({
            type: "POST",
            url: "{{ route('medicine.auto') }}",
            data: {
              query: query
            },
            // contentType: false,
            cache: false,
            // processData: false,
            // dataType: "json",

          })
          .done(function(response) {
            response.forEach(function(item) {
              $('#status').val('use');
              $('.pricediv').hide();
              $('#medi').append(' <option id="' + item.id + '" value="' + item.name + '">');
            })
          })
          .fail(function(error) {
            console.log('no');

            $('#status').val('add');
            $('.pricediv').show();

          });

      }

    });

    $('#sample_form').on('submit', function(event) {
      var name = $('#name').val();
      var quantity = $('#quantity').val();
      console.log(name, quantity);

      event.preventDefault();
      console.log('addes');
      $.ajax({
          url: "{{ route('medicineorder.store') }}",
          method: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          dataType: "json",
        })
        .done(function(data) {
          console.log(data);
          console.log(!$('#finishdev').hasClass('not allowed'));

          if (!$('#finishdev').hasClass('not allowed')) {
            $('#finishdev').append('<button class="text-center btn-block btn btn-danger finish" id=""> finish & Notify Client</button><br>');
          }
          $('#medlist').append('<li class="list-group-item">' +
            name + ' qty ' + quantity + '</li>');
          $('#sample_form')[0].reset();
        });
    });

    $(document).on('click', '.finish', function() {
      $('.finish').text('finishing ');
      $('.finish').prop('disabled', true);
      $.ajax({
          type: "POST",
          url: "/medicineorder/" + $('#hidden_id').val(),
        })
        .done(function(response) {
          $('#addmedbtn').hide();
          $('.finish').hide();
          $('#order_status ').html('<span class="font-weight-bold">status:-</span> {{$order->status}}');
          $('#waitingdev').append('<button class="text-center btn btn-success disabled"> waiting for client</button>');
          // $('#finishdev').append('<button class="text-center btn-block btn btn-dark notify" id="{{$order->user->type->id}}">Notify User</button>');

        })
    });

    $(document).on('click', '.PrescriptionImage', function() {
      $('.prImg').remove();
      $('#Prescription').modal('show');
      image = "<img class='prImg' src='" + $(this)[0].src + "'>";
      $(image).css({
        'width': '400px'
      }).appendTo('.PrescriptionModal');
      // (this).clone().css('width', '400px')
    });

    // $(document).on('click', '.notify', function() {
    //   console.log($('.notify').attr('id'));

    //   $.ajax({
    //       type: "post",
    //       url: "/orders/notifyuser/" + $('.notify').attr('id') + "/" + $('#hidden_id').val(),
    //     })
    //     .done(function(response) {
    //       $('.notify').hide();
    //     })
    // });

  });
</script>
@endsection