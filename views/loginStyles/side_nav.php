<?php




if($_SESSION['role']=='Admin'){

echo' 
         <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">

                    <li>
                        <a href="http://localhost:8080/PharmaMachinery/dashboard"><i ></i> Dashboard </a>
                    </li>

                    <li>
                        <a href="http://localhost:8080/PharmaMachinery/createPlant"><span class="glyphicon glyphicon-plus"></span> Create Plant </a>
                    </li>
                    <li>
                        <a href="http://localhost:8080/PharmaMachinery/modifyPlant"><span class="glyphicon glyphicon-cog"></span> Modify Processes </a>
                    </li>
                    <li>
                        <a href="http://localhost:8080/PharmaMachinery/comment"><span class="glyphicon glyphicon-comment"></span>  Comment </a>
                    </li>
                    
                    <li>
                        <a href="http://localhost:8080/PharmaMachinery/input"><span class="glyphicon glyphicon-upload"></span> Input Process Info</a>
                    </li>

                    <li>
                        <a href="http://localhost:8080/PharmaMachinery/charts"><span class="glyphicon glyphicon-stats"></span> View Bar Charts</a>
                    </li>

                    <li>
                        <a href="http://localhost:8080/PharmaMachinery/download"><span class="glyphicon glyphicon-print"></span> Download Data</a>
                    </li>

                    <li>
                        <a href="http://localhost:8080/PharmaMachinery/processInfo"><span class="glyphicon glyphicon-share"></span> View Process</a>
                    </li>

                    <li>
                        <a href="http://localhost:8080/PharmaMachinery/status"><span class="glyphicon glyphicon-signal"></span> Performance</a>
                    </li>

                    <li>
                        <a href="http://localhost:8080/PharmaMachinery/register"><span class="glyphicon glyphicon-user"></span> Users</a>
                    </li>

                </ul>
            </div>';

}else if($_SESSION['role']=='Operator'){

echo' 
         <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="inputData.php"><i class="fa fa-fw fa-table"></i> Input Process Info</a>
                    </li>

                    <li>
                        <a href="comment.php"><i class="fa fa-fw fa-table"></i> Comment </a>
                    </li>

                    <li>
                        <a href="viewProcessInfo.php"><i class="fa fa-fw fa-edit"></i> View Process</a>
                    </li>

                    <li>
                        <a href="chat.php"><i class="fa fa-fw fa-edit"></i> Messenger</a>
                    </li>


                </ul>
            </div>';

}else if($_SESSION['role']=='Data Analyst'){

echo' 
         <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    
                    <li>
                        <a href="index.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="viewChart.php"><i class="fa fa-fw fa-edit"></i> View Bar Charts</a>
                    </li>

                    <li>
                        <a href="downloadData.php"><i class="fa fa-fw fa-edit"></i> Download Data</a>
                    </li>

                    <li>
                        <a href="comment.php"><i class="fa fa-fw fa-table"></i> Comment </a>
                    </li>


                </ul>
            </div>';

}else if($_SESSION['role']=='Site Assesor'){

echo' 
         <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">

                    <li>
                        <a href="index.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="viewChart.php"><i class="fa fa-fw fa-edit"></i> View Bar Charts</a>
                    </li>

                    <li>
                        <a href="downloadData.php"><i class="fa fa-fw fa-edit"></i> Download Data</a>
                    </li>

                    <li>
                        <a href="comment.php"><i class="fa fa-fw fa-table"></i> Comment </a>
                    </li>

                    <li>
                        <a href="processFeed.php"><i class="fa fa-fw fa-edit"></i> Process Feedback</a>
                    </li>

                    <li>
                        <a href="viewProcessInfo.php"><i class="fa fa-fw fa-edit"></i> View Process</a>
                    </li>

                    <li>
                        <a href="chat.php"><i class="fa fa-fw fa-edit"></i> Messenger</a>
                    </li>

                </ul>
            </div>';

}

?>