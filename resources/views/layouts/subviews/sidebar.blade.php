<div class="col-span-2 bg-gray-900">

    <h1 class="text-3xl py-12 font-bold text-center text-white">
        <a href="/">Torrungruang</a>
    </h1>

    <a href="/" class="flex btn-sidebar">
        <img src="https://i.ibb.co/vLstS06/home.png" alt="Home" width="22px">
        <span>Home</span>
    </a>
    <hr class="h-px mx-3 bg-gray-200 border-0 dark:bg-gray-700">
    <a href="{{ route('specs.index') }}" class="flex btn-sidebar">
        <img src="https://i.ibb.co/3y5Bvsv/rope-4.png" alt="Image Description" width="22px">
        <span>Spec</span>
    </a>
    <a href="{{ route('customers.index') }}" class="flex btn-sidebar">
        <img src="https://i.ibb.co/TvZNC9C/customer.png" alt="Image Description" width="22px">
        <span>Customer</span>
    </a>
    <a href="{{ route('po.index') }}" class="flex btn-sidebar">
        <img src="https://i.ibb.co/H2b6qrF/document.png" alt="Image Description" width="22px">
        <span>Purchase Order</span>
    </a>
    <a href="{{ route('so.index') }}" class="flex btn-sidebar">
        <img src="https://i.ibb.co/j3S2LPT/clipboard.png" alt="Image Description" width="22px">
        <span>Sale Order</span>
    </a>
    <a href="{{ route('deliveries.index') }}" class="flex btn-sidebar">
        <img src="https://i.ibb.co/3N7yQgH/delivery.png" alt="Image Description" width="22px">
        <span>Delivery</span>
    </a>
    <a href="{{ route('invoices.index') }}" class="flex btn-sidebar">
        <img src="https://i.ibb.co/YfjqfvD/invoice.png" alt="Image Description" width="22px">
        <span>Invoice</span>
    </a>
    <a href="{{ route('receipts.index') }}" class="flex btn-sidebar">
        <img src="https://i.ibb.co/SKhHLsf/payment-check.png" alt="Image Description" width="22px">
        <span>Receipt</span>
    </a>
    <hr class="h-px mx-3 bg-gray-200 border-0 dark:bg-gray-700 mt-2">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="flex btn-sidebar w-full">
            <img src="https://i.ibb.co/dgR2KdP/logout.png" alt="Image Description" width="22px" class="mr-2">
            <span>Logout</span>
        </button>
    </form>

</div>
