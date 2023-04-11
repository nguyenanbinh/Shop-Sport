<table class="table table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
           
            <th colspan="1">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($orders as $order)
            @foreach ($order->products as $item)
                {{dump($item->pivot->product_id)}}
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>IMG####</td>
                    <td>{{ $item->pivot->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>${{ $item->pivot->price }}</td>
                    
                    <td><form action="">
                        <input type="submit" class="btn btn-danger" value="Delete">    
                    </form></td>
                </tr>
            @endforeach
      
        @endforeach
       
   
    </tbody>
</table>
