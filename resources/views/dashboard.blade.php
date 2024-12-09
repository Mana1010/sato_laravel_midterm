<x-app-layout>
<div class="flex flex-col py-3 px-5 h-full relative">
    <div class=" py-5">
    <h1 class=" font-semibold flex items-center"><span class="text-4xl text-[#F36C8D]"><ion-icon name="document-text"></ion-icon></span>
        <span class="text-2xl text-slate-800 font-extrabold">PRODUCT FORM</span>
    </h1>
</div>

   @if(session('success'))
   <script>
    alert("{{session('success')}}")
</script>

   @endif
    <form  method="POST" action="{{route('product.store')}}" class="w-full shadow pt-7 px-3 flex flex-col space-y-5 py-6">
        @csrf
        <h1 class=" font-semibold flex items-center space-x-1"><span class="text-xl text-[#F36C8D]"><ion-icon name="bag-add"></ion-icon></span>
            <span class="text-md text-slate-800 font-extrabold">ADD PRODUCT</span>
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 w-full">
            <div class="flex flex-col space-y-1">
                <label for="product_name" class="text-sm font-bold text-[#F36C8D]">PRODUCT NAME</label>
                <input required type="text" id="product_name" name="product_name" class="p-2 rounded-sm border border-black/30"/>
            </div>
            <div class="flex flex-col space-y-1">
                <label for="category" class="text-sm font-bold text-[#F36C8D]">CATEGORY</label>
                <input required type="text" id="category" name="category" class="p-2 rounded-sm border border-black/30"/>
            </div>
            <div class="flex flex-col space-y-1">
                <label for="price" class="text-sm font-bold text-[#F36C8D]">PRICE</label>
                <input required type="number" id="price" name="price" min="1" step="any" value={{1}} class="p-2 rounded-sm border border-black/30"/>
            </div>
            <div class="flex flex-col space-y-1">
                <label for="stock_quantity" class="text-sm font-bold text-[#F36C8D]">STOCK QUANTITY</label>
                <input required type="number" id="stock_quantity" name="stock_quantity" value={{1}} class="p-2 rounded-sm border border-black/30"/>
            </div>
            <div class="flex flex-col space-y-1 col-span-2">
                <label for="manufacturer" class="text-sm font-bold text-[#F36C8D]">MANUFACTURER</label>
                <input required type="string" id="manufacturer" name="manufacturer" class="p-2 rounded-sm border border-black/30"/>
            </div>
            <div class="flex flex-col space-y-1  col-span-2">
                <label for="description" class="text-sm font-bold text-[#F36C8D]">DESCRIPTION </label>
                <textarea required type="text" id="description" name="description" class="p-2 rounded-sm border border-black/30 h-[200px] resize-none"></textarea>
            </div>
        </div>
        <button type="submit" class="md:w-1/3 w-full self-center md:self-start py-2 rounded-md bg-[#D51339] text-white font-bold">ADD NEW PRODUCT</button>
    </form>
    <div class="pt-5">
    <h1 class="text-slate-900 font-semibold text-xl text-start">LIST OF PRODUCTS</h1>
    <table class="w-full border border-slate-900/50 pt-2">
        <thead>
        <tr>
            <th class="p-3 border border-slate-900/50">#</th>
            <th class="p-3 border border-slate-900/50">Product Name</th>
            <th class="p-3 border border-slate-900/50">Category</th>
            <th class="p-3 border border-slate-900/50">Price</th>
            <th class="p-3 border border-slate-900/50">Stock Quantity</th>
            <th class="p-3 border border-slate-900/50">Description</th>
            <th class="p-3 border border-slate-900/50">Manufacturer</th>
            <th class="p-3 border border-slate-900/50">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
            <tr class="text-center">
                <td class="p-3 border border-slate-900/50">{{$key + 1}}</td>
                <td class="p-3 border border-slate-900/50">{{$product->product_name}}</td>
                <td class="p-3 border border-slate-900/50">{{$product->category}}</td>
                <td class="p-3 border border-slate-900/50">{{$product->price}}</td>
                <td class="p-3 border border-slate-900/50">{{$product->stock_quantity}}</td>
                <td class="p-3 border border-slate-900/50">{{$product->description}}</td>
                <td class="p-3 border border-slate-900/50">{{$product->manufacturer}}</td>
                <td class="border border-slate-900/50">
                    <div class="w-full flex space-x-1 items-center justify-center">
                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-white text-sm flex items-center justify-center rounded-md py-1.5 px-2 bg-[#D51339]">
                        <ion-icon name="trash-bin"></ion-icon>
                    </button>
                </form>

                    <a href={{route('product.edit', $product->id)}} type="submit" type="submit" class="text-[#D51339] text-sm flex items-center justify-center rounded-md py-1.5 px-2 border-[#D51339] border">
                        <ion-icon name="create"></ion-icon>
                    </a>
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
</x-app-layout>
