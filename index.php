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
              
            </thead>
            <tbody>
            <?php
                $xml = simplexml_load_file('sample.xml');
                
                if($_POST)
                {
                //    $xml->addAttribute('docname', 'aDoc');
                    $newpatient = $xml->addChild('patient');
                    foreach($_POST as $key=>$value)
                        $newpatient->addAttribute($key, $value);
                }

                $xml->asXML('sample.xml');
                
                $id = 0;
                foreach($xml->patient as $patient)
                {                    
                    echo '<tr>'.PHP_EOL;
                    foreach($patient->attributes() as $key => $value)
                    {
                        if($key=='id')
                            $id = intval($value);
                        echo '<td>'.$value.'</td>'.PHP_EOL;
                    }

                }
            ?>
            </tbody>
        </table>
        <h3>insert</h3>
        <form name="input" method="post">
            <input type="text" name="id" placeholder="Enter id" value="<? echo $id+1; ?>"/><br/>
            <input type="text" name="type" placeholder="Enter type"/><br/>
            <input type="text" name="name" placeholder="Enter name"/><br/>
            <?
                $days = array('sun', 'mon', 'tue', 'wed', 'thu', 'fri');
                foreach($days as $day)
                {
                    ?><input type="text" name="d<? echo $day; ?>" placeholder="Enter hour on <? echo $day; ?>" value="1"/><br/><?
                }
            
            ?>
            <input type="submit" value="insert"/>
        </form>
</div>

<?php include('footer.php'); ?>