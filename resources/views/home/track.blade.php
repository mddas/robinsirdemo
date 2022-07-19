@extends("layouts.masterhome")
@section("order")
<div class="row">
	<div class="col-sm">
		<h4 style="float: right;">Track Your Orer</h4>
	</div>
	<div class="col-sm">
		<form class="form-inline" action="/track" method="get">
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">ORDER ID</label>
    <input type="text" class="form-control" id="inputPassword2" placeholder="Order ID" name="order_id">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Track</button>
</form>
	</div>
	<div class="col-sm">
		
	</div>
</div>

@if($orders!=null)
<div class="modal-content position-relative">
	<div class="c-preloader" style="display: none;">
		<i class="fa fa-spin fa-spinner"></i>
	</div>
	<div id="order-details-modal-body"><style>
		.done.icon{
			background: #63c530!important;
		}
	</style>
	<div class="modal-header">
		<h5 class="modal-title strong-600 heading-5" style="margin-left:10%">Order id: 20220607-15590499</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div>
	<div class="modal-body gry-bg px-3 pt-0">
		<div class="pt-4">
			<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">Order delivery 75 %</div>
</div>
		</div>
		<div class="card mt-4">
			<style>
				.strong-600{
					font-size: 20px;
					color: black;
				}
			</style>
			<div class="card-header py-2 px-3 heading-6 strong-600 clearfix">
				<div class="float-left">Order Summary</div>
			</div>
			<div class="card-body pb-0">
				<div class="row">
					<div class="col-lg-6">
						<table class="details-table table">
							<tbody><tr>
								<td class="w-50 strong-600">Order Code:</td>
								<td>{{$orders['order_id']}}</td>
							</tr>
							<tr>
								<td class="w-50 strong-600">Customer:</td>
								<td>{{json_decode($orders['products'],true)[0]['get_shipping_address']['name']}}</td>
							</tr>
							<tr>
								<td class="w-50 strong-600">Email:</td>
								<td>{{json_decode($orders['products'],true)[0]['get_shipping_address']['email']}}</td>
							</tr>
							<tr>
								<td class="w-50 strong-600">Shipping address:</td>
								<td>{{json_decode($orders['products'],true)[0]['get_shipping_address']['city_town_village']}}</td>
							</tr>
						</tbody></table>
					</div>
					<div class="col-lg-6">
						<table class="details-table table">
							<tbody><tr>
								<td class="w-50 strong-600">Order date:</td>
								<td>{{$orders['created_at']}}</td>
							</tr>
							<tr>
								<td class="w-50 strong-600">Order status:</td>
								<td>@if($orders['payment_type']=="COD")PENDING*@elseif($orders['payment_type']=="E-SEWA")PAID*@endif</td>
							</tr>
							@php
						      $totalPrice = 0;
						      $tax = 0;
						      $discount = 0;
						      $shipping_cost = 0;
                 foreach(json_decode($orders['products'],true) as $product)
                    $totalPrice = $product['get_product']['price']*$product['quantity']+$totalPrice;
                    $tax = $product['get_product']['tax']+$tax;
                    $discount = $product['get_product']['discount']+$discount;
                    $shipping_cost = $product['get_product']['shipping_cost'];
              @endphp
							<tr>
								<td class="w-50 strong-600">Total order amount:</td>
								<td>{{$totalPrice}}</td>
							</tr>
							<tr>
								<td class="w-50 strong-600">Payment method:</td>
								<td>{{$orders['payment_type']}}</td>
							</tr>
						</tbody></table>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-9">
				<div class="card mt-4">
					<div class="card-header py-2 px-3 heading-6 strong-600">Order Details</div>
					<div class="card-body pb-0">
						<table class="details-table table">
							<thead>
								<tr>
									<th>#</th>
									<th width="30%">Product</th>
									<th>Variation</th>
									<th>Quantity</th>
									<th>Delivery Type</th>
									<th>Price</th>
									<th>Refund</th>
								</tr>
							</thead>
							<tbody>
								@foreach(json_decode($orders['products'],true) as $product)
								<tr>
									<td>1</td>
									<td>
										<a href="#" target="_blank">{{$product['get_product']['name']}}</a>
									</td>
									<td>
									</td>
									<td>
										{{$product['quantity']}}
									</td>
									<td>
										Home Delivery
									</td>
									<td>{{$product['get_product']['price']}}</td>
									<td>
										<span class="strong-600">N/A</span>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card mt-4">
					<div class="card-header py-2 px-3 heading-6 strong-600">Order Ammount</div>
					<div class="card-body pb-0">
						<table class="table details-table">
							<tbody>
								<tr>
									<th>Subtotal</th>
									<td class="text-right">
										<span class="strong-600">{{$totalPrice}}</span>
									</td>
								</tr>
								<tr>
									<th>Tax</th>
									<td class="text-right">
										<span class="text-italic">Rs.{{$tax}}</span>
									</td>
								</tr>
								<tr>
									<th>Shipping</th>
									<td class="text-right">
										<span class="text-italic">
											Rs.{{$shipping_cost}}
										</span>
									</td>
								</tr>
								<tr>
									<th>Discount</th>
									<td class="text-right">
										<span class="text-italic">Rs.{{$discount}}</span>
									</td>
								</tr>
								<tr>
									<th><span class="strong-600">Total</span></th>
									<td class="text-right">
										<strong><span>Rs.{{$totalPrice+$shipping_cost+$tax-$discount}}</span></strong>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript">
		function show_make_payment_modal(order_id){
			$.post('http://sewa-digital.nextnepal.org/purchase_history/make_payment', {_token:'EpuvpBav6vp8uKJnGlcCzhD8eayNnabe8ifpDeF2', order_id : order_id}, function(data){
				$('#payment_modal_body').html(data);
				$('#payment_modal').modal('show');
				$('input[name=order_id]').val(order_id);
			});
		}
	</script>
</div>
</div>
@endif

@endsection