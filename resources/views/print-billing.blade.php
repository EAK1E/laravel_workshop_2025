<h3>แจ้งค่าบริการ</h3>
<h4>{{ $organization->name }}</h4>

<div>ของเดือน {{ date('m/Y', strtotime($billing->created_at)) }}</div>
<div>ห้องที่ {{ $billing->room->name }}</div>
<div>ผู้เช่า {{ $billing->getCustomer()->name }}</div>
<div>เบอร์โทรศัพท์ {{ $billing->getCustomer()->phone }}</div>

<table width="100%" cellpadding="8" cellspacing="0" style="margin-top: 10px"; border-collapse  border="1">
    <thead>
        <tr style="backgound-color:grey">
            <th>รายการ</th>
            <th align="right">ราคา</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>ค่าเช่า</td>
            <td align="right" width="100px">{{ number_format($billing->amount_rent) }}</td>
        </tr>
        <tr>
            <td>ค่าน้ำ</td>
            <td align="right" width="100px"> {{ number_format($billing->amount_water) }} </td>
        </tr>
        <tr>
            <td>ค่าไฟฟ้า</td>
            <td align="right" width="100px"> {{ number_format($billing->amount_electric) }} </td>
        </tr>
        <tr>
            <td>ค่าอินเทอร์เน็ต</td>
            <td align="right" width="100px"> {{ number_format($billing->amount_internet) }} </td>
        </tr>
        <tr>
            <td>ค่าฟิตเนส</td>
            <td align="right" width="100px"> {{ number_format($billing->amount_fitness) }} </td>
        </tr>
        <tr>
            <td>ค่าซักรีด</td>
            <td align="right" width="100px"> {{ number_format($billing->amount_wash) }} </td>
        </tr>
        <tr>
            <td>ค่าอื่นๆ</td>
            <td align="right" width="100px"> {{ number_format($billing->amount_etc) }}</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td align="right" style="font-weight:bold">รวม</td>
            <td align="right" style="background-color:yellow"> {{ number_format($billing->sumAmount()) }} </td>
        </tr>
    </tfoot>
</table>

<script>
    window.print();
</script>