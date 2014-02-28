<?php include('header.php'); ?>


 <div class="hero-unit">
   <style>
    table{border-collapse:collapse;}table,th,td{border: 1px solid black;}
    </style>
    <body>
        <table width="500px">
            <thead>
                <th>ID</th>
                <th>name</th>
                <th>birth</th>
                <th>phone</th>
                <th>address</th>
                <th>brief</th>
                <th>patient_record</th>
                <th>appoint_date</th>
                <th>arrival_date</th>
              <th>Doctor Name</th>
            </thead>
            <tbody>
            <?php
                $xml = simplexml_load_file('sample.xml');
                
                if($_POST)
                {
                //    $xml->addAttribute('type', 'documentary');
                    $newpatient = $xml->addChild('patient');
                    foreach($_POST as $key=>$value)
                        $newpatient->addAttribute($key, $value);
                }

                $xml->asXML('sample.xml');
                
                $id = 0;
                foreach($xml->patient as $patient)
                {
                    $total = 0;
                    echo '<tr>'.PHP_EOL;
                    foreach($patient->attributes() as $key => $value)
                    {
                        if($key[0]=='d')
                            $total += intval($value);
                        else if($key=='id')
                            $id = intval($value);
                        echo '<td>'.$value.'</td>'.PHP_EOL;
                    }

                    echo '</tr>'.PHP_EOL;
                }
            ?>
            </tbody>
        </table>
        <h3>insert</h3>
        <form name="input" method="post">
            <input type="text" name="id" placeholder="Enter id" value="<? echo $id+1; ?>"/><br/>
            <input type="text" name="name" placeholder="Enter name"/><br/>
             <input type="text" name="birth" placeholder="Enter birth"/><br/>
              <input type="text" name="phone" placeholder="Enter phone"/><br/>
               <input type="text" name="address" placeholder="Enter address"/><br/>
                <input type="text" name="brief" placeholder="Enter brief"/><br/>
<input type="text" name="patient_record" placeholder="Enter patient_record"/><br/>
<input type="text" name="appoint_date" placeholder="Enter appoint_date"/><br/>
<input type="text" name="arrival_date" placeholder="Enter arrival_date"/><br/>
<input type="text" name="doctor_name" placeholder="Enter Doctor Name"/><br/>
            <input type="submit" value="insert"/>
        </form>
            </tbody>
        </table>

</div>

<?php include('footer.php'); ?>