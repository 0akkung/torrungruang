<div style="padding: 2rem;">
    <div style="display: flex; flex-direction: row; margin-bottom: 1.25rem; text-align: center;">
        <h1 style="padding: 0.05rem; background-color: #0599a6; padding-top: 0.25rem;"></h1>
        <h1 style="color: #0599a6; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); display: inline-block; font-weight: bold;">Sale Order Detail</h1>
        <h1 style="padding: 0.05rem; background-color: #0599a6; padding-top: 0.25rem;"></h1>
    </div>

    <div style="width: 100%;">
        <div style="background-color: #fff; padding: 1.25rem; border: 1px solid #e5e5e5; width: 100%; border-radius: 12px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <div style="margin-top: 1.5rem; margin-bottom: 1.5rem;">
                <table style="width: 100%; font-size: 0.875rem;  text-align: left; color: #666; border-radius: 12px;">
                    <thead style="font-size: 0.75rem; text-transform: uppercase; background-color: #0599a6; color: #fff;">
                        <tr>
                            <th style="padding: 0.375rem 1rem;">SO ID</th>
                            <th style="padding: 0.375rem 1rem;">SO Create Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="background-color: #fff; border-bottom: 1px solid #e5e5e5; text-align: center;">
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$saleOrder->id}}</td>
                            <td style="padding: 0.5rem 1rem; font-weight: 600; color: #333;">{{$saleOrder->sale_date}}</td>
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%; font-size: 0.875rem; text-align: left; color: #666; border-radius: 12px;">
                    <thead style="font-size: 0.75rem; text-transform: uppercase; background-color: #0599a6; color: #fff;">
                        <tr>
                            <th style="padding: 0.375rem 1rem;">PO ID</th>
                            <th style="padding: 0.375rem 1rem;">Company Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="background-color: #fff; border-bottom: 1px solid #e5e5e5; text-align: center;">
                            <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$purchaseOrder->id}}</td>
                            <td style="padding: 0.5rem 1rem; font-weight: 600; color: #333;">{{$customer->company_name}}</td>
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%; font-size: 0.875rem; text-align: left; color: #666; border-radius: 12px;">
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
                <table style="width: 100%; font-size: 0.875rem; text-align: left; color: #666; border-radius: 12px;">
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
            </div>

            <div style="padding: 0.5rem; background-color: #0599a6; color: #fff; font-weight: bold; font-size: 1rem; text-align: center; border-top-left-radius: 12px; border-top-right-radius: 12px;">Description</div>
            <table style="width: 100%; font-size: 0.875rem; text-align: left; color: #666; border-radius: 12px;">
                <thead style="font-size: 0.75rem; text-transform: uppercase; background-color: #0599a6; color: #fff;">
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
                    @foreach ($soItems as $soItem)
                    <tr style="background-color: #fff; border-bottom: 1px solid #e5e5e5; text-align: center;">
                        <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$loop->iteration}}</td>
                        <td style="padding: 0.5rem 1rem; font-weight: 600; color: #333;">{{$soItem->rope_spec_id}}</td>
                        <td style="padding: 0.5rem 1rem; font-weight: 600; color: #333;">{{$soItem->ropeSpec->spec_name}}</td>
                        <td style="padding: 0.375rem 1rem; font-weight: 600; color: #333;">{{$soItem->sale_quantity}}</td>
                        @foreach ($soItem->saleOrder->purchaseOrder->poItems as $poItem)
                        @if ($poItem->rope_spec_id == $soItem->rope_spec_id)
                        <td style="padding: 0.5rem 1rem; font-weight: 600; color: #333;">{{ $poItem->unit }}</td>
                        <td style="padding: 0.5rem 1rem; font-weight: 600; color: #333;">{{ $poItem->unit_price }}</td>
                        @break
                        @endif
                        @endforeach
                        <td style="padding: 0.5rem 1rem; font-weight: 600; color: #333;">{{$soItem->so_item_price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="font-size: 1rem; font-weight: 600; display: flex; flex-direction: column; margin-top: 1.5rem;">
                <div style="margin-bottom: 0.5rem;">Total price&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$saleOrder->original_order_price}}</div>
                <div>Price Inclusive of 7% VAT&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;{{$saleOrder->total_order_price}}</div>
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
            </div>

        </div>
    </div>
</div>