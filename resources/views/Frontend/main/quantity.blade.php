@if(Session::has('Cart') != null)
<span  id="total-quantity-show"> {{Session::get('Cart')->totalQuantity}}</span>
@endif
