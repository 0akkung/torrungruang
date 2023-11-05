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
    <div style="padding: 0.5rem;">
        <div style="display: flex; flex-direction: row; margin-bottom: 1.25rem; text-align: center;">
            <h1 style="padding: 0.05rem; background-color: #0599a6; padding-top: 0.1rem;"></h1>
            <h1 style="color: #0599a6; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); display: inline-block; font-weight: bold; font-size: 2rem;">Receipt Detail</h1>
            <h1 style="padding: 0.05rem; background-color: #0599a6; padding-top: 0.1rem;"></h1>
        </div>

        <div style="width: 100%;">
            <div style="background-color: #fff; padding: 1.25rem; border: 1px solid #e5e5e5; width: 100%; border-radius: 12px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <div style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
                    <table style="width: 100%; font-size: 0.875rem;  text-align: left; color: #666; border-radius: 12px;">
                        <thead style="font-size: 0.75rem; text-transform: uppercase; background-color: #0599a6; color: #fff;">
                            <tr>
                                <th style="padding: 0.375rem 1rem;">Receipt ID</th>
                                <th style="padding: 0.375rem 1rem;">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: #ddd; border-bottom: 1px solid #e5e5e5; text-align: center;">
                                <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333; ">{{$receipt->id}}</td>
                                <td style="padding: 0.5rem 1rem; font-weight: 600; color: #333;">{{$purchaseOrder->purchase_date}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 100%; font-size: 0.875rem; text-align: left; color: #666; border-radius: 12px;">
                        <thead style="font-size: 0.75rem; text-transform: uppercase; background-color: #0599a6; color: #fff;">
                            <tr>
                                <th style="padding: 0.375rem 1rem;">Company Name</th>
                                <th style="padding: 0.375rem 1rem;">Original PO ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: #ddd; border-bottom: 1px solid #e5e5e5; text-align: center;">
                                <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333; ">{{$customer->company_name}}</td>
                                <td style="padding: 0.5rem 1rem; font-weight: 600; color: #333;">{{$purchaseOrder->customer_po_id}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 100%; font-size: 0.875rem; text-align: left; color: #666; border-radius: 12px;">
                        <thead style="font-size: 0.75rem; text-transform: uppercase; background-color: #0599a6; color: #fff;">
                            <tr>
                                <th style="padding: 0.375rem 1rem;">Purchaser</th>
                                <th style="padding: 0.375rem 1rem;">Tel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: #ddd; border-bottom: 1px solid #e5e5e5; text-align: center;">
                                <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$customer->purchaser_name}}</td>
                                <td style="padding: 0.5rem 1rem; font-weight: 600; color: #333;">{{$customer->phone_number}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 100%;  text-align: left; color: #666; border-radius: 12px;">
                        <thead style="font-size: 0.75rem; text-transform: uppercase; background-color: #0599a6; color: #fff;">
                            <tr>
                                <th style="padding: 0.375rem 1rem;">Shipping address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: #ddd; border-bottom: 1px solid #e5e5e5; text-align: center;">
                                <td style="padding: 0.5rem 1rem; font-weight: 600; color: #333;">{{$address->address_detail}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="padding: 0.5rem; background-color: #0599a6; color: #fff; font-weight: bold;  text-align: center; border-top-left-radius: 12px; border-top-right-radius: 12px;">Description</div>
                <table style="width: 100%;  text-align: left; color: #666; border-radius: 12px;">
                    <thead style=" text-transform: uppercase; background-color: #0599a6; color: #fff;">
                        <tr>
                            <th style="padding: 0.375rem 1rem;">NO.</th>
                            <th style="padding: 0.375rem 1rem;">SPEC ID</th>
                            <th style="padding: 0.375rem 1rem;">SPEC NAME</th>
                            <th style="padding: 0.375rem 1rem;">QUANTITY</th>
                            <th style="padding: 0.375rem 1rem;">UNIT</th>
                            <th style="padding: 0.375rem 1rem;">UNIT PRICE</th>
                            <th style="padding: 0.375rem 1rem;">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($poItems as $poItem)
                        <tr style="background-color: #ddd; border-bottom: 1px solid #e5e5e5; text-align: center;">
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$loop->iteration}}</td>
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$poItem->rope_spec_id}}</td>
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$poItem->ropeSpec->spec_name}}</td>
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$poItem->order_quantity}}</td>
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$poItem->unit}}</td>
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$poItem->unit_price}}</td>
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$poItem->po_item_price}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="font-weight: 600; display: flex; flex-direction: column; margin-top: 1.5rem;">
                    <div style="margin-bottom: 0.5rem;">Note&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$purchaseOrder->note}}</div>
                    <div style="margin-bottom: 0.5rem;">Total price&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$purchaseOrder->original_order_price}}&nbsp;Baht</div>
                    <div>Price Inclusive of 7% VAT&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$purchaseOrder->total_order_price}}&nbsp;Baht</div>
                    <div style="margin-bottom: 0.5rem;">Recipient&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$receipt->receipter_name}}</div>
                </div>
            </div>
        </div>
    </div>