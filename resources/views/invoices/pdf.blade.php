<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="companyLogo.png">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@12.0.1/dist/sweetalert2.min.css">
    <title>Torrungruang</title>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="flex mb-5">
    <h1 class="px-1 bg-tag py-1 mr-1"></h1>
    <h1 class="px-1 bg-tag py-1"></h1>
    <h1 class="text-header bg-white shadow-md px-5 py-1 inline text-2xl font-bold rounded-r-lg">Delivery Detail</h1>
</div>
<div class="w-full">
    <div class="bg-white p-5 border w-full rounded-[12px] shadow-md">
        <div>
            <div class="grid grid-cols-4 mb-6 mt-6 text-lg font-semibold">
                <div class="col-span-2 flex flex-col">
                    <p class="text-gray-600 text-sm font-semibold">Invoice ID</p>
                    <p>{{$invoice->id}}</p>
                </div>
                <div class="col-span-2 flex flex-col">
                    <p class="text-gray-600 font-semibold text-sm">Delivery Date</p>
                    <p>{{$invoice->bill_date}}</p>
                </div>
                <div class="col-span-2 flex flex-col">
                    <p class="text-gray-600 font-semibold text-sm">PO ID</p>
                    <p>{{$purchaseOrder->id}}</p>
                </div>
                <div class="col-span-2 flex flex-col">
                    <p class="text-gray-600 font-semibold text-sm">Company Name</p>
                    <p>{{$customer->company_name}}</p>
                </div>
                <div class="col-span-2 flex flex-col">
                    <p class="text-gray-600 font-semibold text-sm">Original PO ID</p>
                    <p>{{$purchaseOrder->customer_po_id}}</p>
                </div>
                <div class="col-span-2 flex flex-col">
                    <p class="text-gray-600 font-semibold text-sm">Purchaser</p>
                    <p>{{$customer->purchaser_name}}</p>
                </div>
                <div class="col-span-2 flex flex-col">
                    <p class="text-gray-600 font-semibold text-sm">Tel</p>
                    <p>{{$customer->phone_number}}</p>
                </div>
                <div class="col-span-2 flex flex-col">
                    <p class="text-gray-600 font-semibold text-sm">Shipping address</p>
                    <p>{{$address->address_detail}}</p>
                </div>
            </div>
            <div>
                <div class="p-2 bg-table text-white font-bold text-lg text-center rounded-t-lg">
                   Description
                </div>
                <hr class="border-2 border-gray-300">
                <table class="w-full text-sm text-left text-gray-400 rounded-lg">
                    <thead class="text-xs uppercase bg-table text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">NO.</th>
                            <th scope="col" class="px-6 py-3 text-center">Delivery Date</th>
                            <th scope="col" class="px-6 py-3 text-center">Amount</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saleOrders as $saleOrder)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-3 font-medium text-gray-900">{{$loop->iteration}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{$saleOrder->delivery->delivery_date}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{$saleOrder->total_order_price}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-lg font-semibold flex flex-col space-y-1 mb-1 mt-1">
                <div>ราคาทั้งหมด  {{$saleOrder->total_order_price}}</div>
                <div>Billing Office  {{$invoice->Billing_Officer}}</div>
            </div>
        </div>
    </div>
</div>
</body>
</html>