<h2 class="page-header">View Patient Records</h2> 
<br><br>


<table class="table data_table table-responsive">
    <thead>
        <tr>
            <th>SN</th>
            <th>Title</th>
            <th>First Name</th>
            <th>Surname</th>
            <th>DOB</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Referred</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php 
            require_once("api/read.php");

            $read = new Read();
            $records = $read->records();

            if(!empty($records)){
                
                foreach($records as $index => $record){ ?>
                    <tr>
                        <td>#<?php echo $index;?></td>
                        <td><?php echo $record["title"];?></td>
                        <td><?php echo $record["first_name"];?></td>
                        <td><?php echo $record["surname"];?></td>
                        <td><?php echo $record["dob"];?></td>
                        <td><?php echo $record["email"];?></td>
                        <td><?php echo $record["mobile"];?></td>
                        <td><?php echo $record["address"];?></td>
                        <td>
                            <?php 
                                if(!empty(trim($record["referred"]))){ ?>
                                    <span>yes <sub>referred</sub></span> <?php 
                                } else { ?> <span>yes <sub>referred</sub></span> <?php }
                            ?>
                        </td>
                        <td>
                            <?php 
                                if(trim($record["status"]) == 0){ ?>
                                    <span>rejected</span> <?php 
                                } else { ?> <span>approved</sub></span> <?php }
                            ?>
                        </td>
                        <td>
                            <?php 
                                if(trim($record["status"]) == 0){ ?>
                                    <a class='btn btn-success' href='index.php?page=view&status=yes'>Approve?</a> <?php 
                                } else { ?> <a class='btn btn-danger' href='index.php?page=view&status=no'>Reject?</a> <?php }
                            ?>
                        </td>
                    </tr> <?php 
                }
            }
        ?>
    </tbody>
</table>


<script>
    $(document).ready( function () {
        $('.data_table').DataTable();
    });
</script>