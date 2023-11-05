<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        body {
            font-weight: bolder;
            font-size: 18px;
            /* ปรับขนาดตัวอักษรตามต้องการ */
        }

        h1,
        th,
        td,
        div {
            font-weight: bolder;
            font-size: 20px;
            /* ปรับขนาดตัวอักษรตามต้องการ */
        }
    </style>
</head>

<body>
<div style="padding: 2rem;">
    <div style="display: flex; flex-direction: row; margin-bottom: 1.25rem; text-align: center;">
        <h1 style="padding: 0.05rem; background-color: #0599a6; padding-top: 0.25rem;"></h1>
        <h1 style="color: #0599a6; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); display: inline-block; font-weight: bold;">Purchase Order Detail</h1>
        <h1 style="padding: 0.05rem; background-color: #0599a6; padding-top: 0.25rem;"></h1>
    </div>

    <div style="width: 100%;">
        <div style="background-color: #fff; padding: 1.25rem; border: 1px solid #e5e5e5; width: 100%; border-radius: 12px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <div style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
                <table style="width: 100%; font-size: 0.875rem; text-align: left; color: #666;">
                    <thead style="font-size: 0.75rem; text-transform: uppercase; background-color: #0599a6; color: #fff;">
                        <tr>
                            <th style="padding: 0.375rem 1rem;">PO ID</th>
                            <th style="padding: 0.375rem 1rem;">PO Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="background-color: #fff; border-bottom: 1px solid #e5e5e5; text-align: center;">
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$purchaseOrder->id}}</td>
                            <td style="padding: 0.5rem 1rem; font-weight: 600; color: #333;">{{$purchaseOrder->purchase_date}}</td>
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%; font-size: 0.875rem; text-align: left; color: #666;">
                    <thead style="font-size: 0.75rem; text-transform: uppercase; background-color: #0599a6; color: #fff;">
                        <tr>
                            <th style="padding: 0.375rem 1rem;">Due Date</th>
                            <th style="padding: 0.375rem 1rem;">Company Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="background-color: #fff; border-bottom: 1px solid #e5e5e5; text-align: center;">
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$purchaseOrder->due_date}}</td>
                            <td style="padding: 0.5rem 1rem; font-weight: 600; color: #333;">{{$customer->company_name}}</td>
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%; font-size: 0.875rem; text-align: left; color: #666;">
                    <thead style="font-size: 0.75rem; text-transform: uppercase; background-color: #0599a6; color: #fff;">
                        <tr>
                            <th style="padding: 0.375rem 1rem;">Original PO ID</th>
                            <th style="padding: 0.375rem 1rem;">Purchaser</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="background-color: #fff; border-bottom: 1px solid #e5e5e5; text-align: center;">
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$purchaseOrder->customer_po_id}}</td>
                            <td style="padding: 0.5rem 1rem; font-weight: 600; color: #333;">{{$customer->purchaser_name}}</td>
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%; font-size: 0.875rem; text-align: left; color: #666;">
                    <thead style="font-size: 0.75rem; text-transform: uppercase; background-color: #0599a6; color: #fff;">
                        <tr>
                            <th style="padding: 0.375rem 1rem;">Tel</th>
                            <th style="padding: 0.375rem 1rem;">Shipping address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="background-color: #fff; border-bottom: 1px solid #e5e5e5; text-align: center;">
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$customer->phone_number}}</td>
                            <td style="padding: 0.5rem 1rem; font-weight: 600; color: #333;">{{$address->address_detail}}</td>
                        </tr>
                    </tbody>
                </table>
    
    
    
                <div style="width: auto; text-align: center; margin-top: 1rem; padding: 0.5rem; background-color: #0599a6; color: #fff; font-weight: bold; font-size: 0.875rem; text-align: center; border-top-left-radius: 12px; border-top-right-radius: 12px;">Description</div>
                <table style="width: 100%; color: #666;">
                    <thead style="font-size: 0.75rem; text-transform: uppercase; background-color: #0599a6; color: #fff;">
                        <tr>
                            <th style="padding: 0.375rem 1rem;">NO.</th>
                            <th style="padding: 0.375rem 1rem;">SPEC ID</th>
                            <th style="padding: 0.375rem 1rem;">SPEC NAME</th>
                            <th style="padding: 0.375rem 1rem;">QUANTITY</th>
                            <th style="padding: 0.375rem 1rem;">REMAINING QUANTITY</th>
                            <th style="padding: 0.375rem 1rem;">UNIT</th>
                            <th style="padding: 0.375rem 1rem;">UNIT PRICE</th>
                            <th style="padding: 0.375rem 1rem;">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($poItems as $poItem)
                        <tr style="background-color: #fff; border-bottom: 1px solid #e5e5e5; text-align: center;">
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$loop->iteration}}</td>
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$poItem->rope_spec_id}}</td>
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$poItem->ropeSpec->spec_name}}</td>
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$poItem->order_quantity}}</td>
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$poItem->remaining_quantity}}</td>
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$poItem->unit}}</td>
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$poItem->unit_price}}</td>
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$poItem->po_item_price}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    
                <div style="font-size: 1rem; font-weight: 600; display: flex; flex-direction: column; margin-top: 1.5rem;">
                    <div style="margin-top: 0.5rem;">
                        Note&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$purchaseOrder->note}}
                    </div>
                    <div style="margin-top: 0.5rem;">Total price&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$purchaseOrder->original_order_price}}&nbsp;Baht</div>
                    <div style="margin-top: 0.5rem;">Price Inclusive of 7% VAT&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$purchaseOrder->total_order_price}}&nbsp;Baht</div>
                </div>
    
                <div style="font-size: 1rem; font-weight: 600; display: flex; flex-direction: column; margin-top: 1rem;">
                    <div style="margin-top: 1rem;">
                        Shipping status&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;
                        @if($purchaseOrder->produce_status == 0)
                        <span style="color: white; font-size: 0.875rem; width: 33.33%; padding-bottom: 0.5rem; background-color: #ff0000; font-weight: 600; padding: 0.5rem 1rem; border-radius: 9999px; margin-bottom: 0.5rem;">UNFinish</span>
                        @else
                        <span style="color: white; font-size: 0.875rem; width: 33.33%; padding-bottom: 0.5rem; background-color: #00cc66; font-weight: 600; padding: 0.5rem 1rem; border-radius: 9999px; margin-bottom: 0.5rem;">Finish</span>
                        @endif
                    </div>
                    <div style="margin-top: 1rem;">
                        Payment&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;
                        @if($purchaseOrder->payment_status == 0)
                        <span style="color: white; font-size: 0.875rem; width: 33.33%; padding-bottom: 0.5rem; background-color: #ff0000; font-weight: 600; padding: 0.5rem 1rem; border-radius: 9999px; margin-bottom: 0.5rem;">UNFinish</span>
                        @else
                        <span style="color: white; font-size: 0.875rem; width: 33.33%; padding-bottom: 0.5rem; background-color: #00cc66; font-weight: 600; padding: 0.5rem 1rem; border-radius: 9999px; margin-bottom: 0.5rem;">Finish</span>
                        @endif
                    </div>
                </div>
            </div>
    </div>
    </div>
</div>
</body>