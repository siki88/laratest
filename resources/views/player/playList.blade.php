<p class="pForTable">ALBUM</p>
<table style="width:100%">
    <tr>
        <th>Name</th>
        <th>Long</th>
        <th>Size</th>
        <th>Action</th>
    </tr>
    <tr class='clickable-row' data-href='url://' onclick="trclick()">
        <td>Jill</td>
        <td>Smith</td>
        <td>50</td>
        <td>open</td>
    </tr>
    <tr class='clickable-row' data-href='url://' onclick="trclick()">
        <td>Eve</td>
        <td>Jackson</td>
        <td>50</td>
        <td style="font-weight: bold;">close</td>
    </tr>
</table>

<script>
    function trclick(){
        console.log('tr clicked')
    };
</script>
