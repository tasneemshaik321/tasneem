<?php

$employees = [
    ['name' => 'John Doe', 'department' => 'IT', 'salary' => 6000, 'experience' => 5, 'joining_year' => 2018, 'projects' => ['ERP System', 'Mobile App']],
    ['name' => 'Jane Smith', 'department' => 'HR', 'salary' => 4500, 'experience' => 7, 'joining_year' => 2016, 'projects' => ['Employee Portal']],
    ['name' => 'Michael Johnson', 'department' => 'Finance', 'salary' => 7000, 'experience' => 10, 'joining_year' => 2013, 'projects' => ['Accounting Software', 'Investment Tracker']],
    ['name' => 'Emily Davis', 'department' => 'Marketing', 'salary' => 5200, 'experience' => 6, 'joining_year' => 2017, 'projects' => ['SEO Campaign', 'Ad Analytics']],
    ['name' => 'Robert Brown', 'department' => 'Sales', 'salary' => 4800, 'experience' => 4, 'joining_year' => 2019, 'projects' => ['E-commerce Expansion', 'Retail CRM']],
    ['name' => 'Olivia Wilson', 'department' => 'IT', 'salary' => 7500, 'experience' => 12, 'joining_year' => 2011, 'projects' => ['AI Chatbot', 'Security Patch']],
    ['name' => 'William Taylor', 'department' => 'Finance', 'salary' => 6800, 'experience' => 8, 'joining_year' => 2015, 'projects' => ['Risk Analysis', 'Tax Optimization']],
    ['name' => 'Sophia Martinez', 'department' => 'HR', 'salary' => 4800, 'experience' => 5, 'joining_year' => 2018, 'projects' => ['Recruitment Drive', 'Employee Satisfaction Survey']],
    ['name' => 'James Anderson', 'department' => 'Marketing', 'salary' => 5000, 'experience' => 7, 'joining_year' => 2016, 'projects' => ['Social Media Campaign', 'Product Branding']],
    ['name' => 'Ava Thomas', 'department' => 'Sales', 'salary' => 5300, 'experience' => 6, 'joining_year' => 2017, 'projects' => ['B2B Expansion', 'Customer Retention']]
];

// Displaying Employee Data in a Table

echo "<h1>Employee Details Table</h1>\n";

function printEmpTable($employees){
    $e = $employees[0];
    echo "<table border='1' cellpadding='10' cellspacing='0'><tr>";
    foreach($e as $emp=>$d){
        echo "<th>".$emp."</th>";
    }
    echo "</tr>";
    foreach($employees as $emp){
        echo "<tr>";
        foreach($emp as $x => $y){
            if(is_array($y)){
                // implode("separator", $array_name) is used to split the array by comma seperated
                echo "<td>".implode(", ", $y)."</td>";
            }
            else{
                echo "<td>".$emp[$x]." </td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>\n";
}

printEmpTable($employees);

// calculating salary statistics

$salaries = array_column($employees, 'salary');
$sum = array_sum($salaries);
echo "\n <br><br><h3>The average salary is ".$sum/count($salaries)."</h3>\n";

// $high_salary = max(array_column($employees, 'salary'));
// echo "<h3>The highest salary is ".$high_salary."</h3>";
// $lowest_salary = min(array_column($employees, 'salary'));
// echo "<h3>The lowest salary is ".$lowest_salary."</h3>";

// foreach($employees as $emp){
//     if($emp['salary']==$high_salary){
//         echo "<h3>The highest salary ".$high_salary." is obtained by ".$emp['name']." in ".$emp['department']."</h3>";
//         break;
//     }
// }

// foreach($employees as $emp){
//     if($emp['salary']==$lowest_salary){
//         echo "<h3>The lowest salary ".$lowest_salary." is obtained by ".$emp['name']." in ".$emp['department']."</h3>";
//         break;
//     }
// }

// find max and min using array_search() method

$salaries = array_column($employees, 'salary');
$high_sal = max($salaries);
$low_sal = min($salaries);
$high_sal_idx = array_search($high_sal, $salaries);
$low_sal_idx = array_search($low_sal, $salaries);

$high_paid_emp = $employees[$high_sal_idx];
$low_paid_emp = $employees[$low_sal_idx];


echo "<h3>The highest salary ".$high_paid_emp['salary']." is obtained by ".$high_paid_emp['name']." in ".$high_paid_emp['department']."</h3>";

echo "<h3>The lowest salary ".$low_paid_emp['salary']." is obtained by ".$low_paid_emp['name']." in ".$low_paid_emp['department']."</h3>";

// Department-wise Salary Analysis

$dept_wise_salaries = array_reduce($employees, function($carry, $emp){
    $carry[$emp['department']] = ($carry[$emp['department']] ?? 0) + $emp['salary'];
    return $carry;
}, []);

echo "<br><h1>Department wise salary analysis table</h1><br>";
echo "<table border='1' cellpadding='10' cellspacing='0'><tr>";
echo "<th>Department</th><th>Salary</th>";
foreach($dept_wise_salaries as $d => $s){
    echo "<tr>";
    echo "<td>".$d."</td><td>".$s."</td>";
    echo "<tr>";
}
echo "</table>";

$max_salary_in_each_dept = array_filter($employees, function($emp){
    return $emp['salary'];
});

$departments = array_unique(array_column($employees, 'department')); // Get unique departments
$highest_salaries = [];

// Find the highest salary for each department
foreach ($departments as $dept) {
    $dept_salaries = array_column(array_filter($employees, fn($e) => $e['department'] === $dept), 'salary');
    $highest_salaries[$dept] = max($dept_salaries);
}

// Ensure all array keys are properly quoted
$high_paid_emp = array_filter($employees, function ($e) use ($highest_salaries) {
    return isset($highest_salaries[$e['department']]) && $e['salary'] == $highest_salaries[$e['department']];
});

// Display the result
echo "<h1>Employees with the highest salary in each department</h1>\n";
echo "<table border='1' cellpadding='10' cellspacing='0'>\n";
echo "<tr><th>Name</th><th>Department</th><th>Salary</th></tr>\n";

foreach ($high_paid_emp as $emp) {
    echo "<tr><td>{$emp['name']}</td><td>{$emp['department']}</td><td>\${$emp['salary']}</td></tr>\n";
}

echo "</table>";

$exp = array_filter($employees, function($e){
    return $e['experience']>5;
});

echo "<h2>Employees with More Than 5 Years of Experience</h2>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Name</th><th>Department</th><th>Salary</th><th>Experience (Years)</th></tr>";

foreach ($exp as $emp) {
    echo "<tr>
            <td>{$emp['name']}</td>
            <td>{$emp['department']}</td>
            <td>{$emp['salary']}</td>
            <td>{$emp['experience']}</td>
          </tr>";
}
echo "</table>";

$less_than_5 = 0;
$five_to_10 = 0;
$more_than_10 = 0;

foreach($employees as $emp){
    if($emp['experience']<5){
        $less_than_5++;
    }
    else if($emp['experience']>=5 && $emp['experience']<=10){
        $five_to_10++;
    }
    else if($emp['experience']>10){
        $more_than_10++;
    }
}

echo "<h3>Employees with less than 5 years of experience: $less_than_5</h3>";
echo "<h3>Employees with 5 to 10 years of experience: $five_to_10</h3>";
echo "<h3>Employees with more than 10 years of experience: $more_than_10</h3>";

$given_year = 2017; // Change this to any year you want

$before_given_year = array_filter($employees, function($e) use ($given_year) {
    return $e['joining_year'] < $given_year;
});

// Display Results in Table Format
echo "<h2>Employees Who Joined Before $given_year</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>Name</th><th>Department</th><th>Salary</th><th>Experience</th><th>Joining Year</th><th>Projects</th></tr>";

foreach($before_given_year as $emp){
    echo "<tr>";
    echo "<td>{$emp['name']}</td>";
    echo "<td>{$emp['department']}</td>";
    echo "<td>{$emp['salary']}</td>";
    echo "<td>{$emp['experience']}</td>";
    echo "<td>{$emp['joining_year']}</td>";
    echo "<td>" . implode(", ", $emp['projects']) . "</td>";
    echo "</tr>";
}

echo "</table>";

echo "<h2>Employees Working on 'SEO Campaign'</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>Name</th><th>Department</th><th>Salary</th><th>Experience</th><th>Joining Year</th><th>Projects</th></tr>";

foreach($employees as $emp){
    if(in_array("SEO Campaign", $emp['projects'])){
        // for seraching ele in array Syntax: in_array
        echo "<tr>";
        echo "<td>{$emp['name']}</td>";
        echo "<td>{$emp['department']}</td>";
        echo "<td>{$emp['salary']}</td>";
        echo "<td>{$emp['experience']}</td>";
        echo "<td>{$emp['joining_year']}</td>";
        echo "<td>" . implode(", ", $emp['projects']) . "</td>";
        echo "</tr>";
    }
}

echo "</table>";

echo "<h1>Employees descending order based on their salaries</h1>";

usort($employees, function($a, $b){
    return $b['salary']-$a['salary'];
});

printEmpTable($employees);

echo "<h1>Employees descending order based on thier experience</h1>";

usort($employees, function($a, $b){
    return $b['experience']-$a['experience'];
});

printEmpTable($employees);

$depts = array_unique(array_column($employees, 'department'));
$prjcts = array_unique(array_merge(...array_column($employees, 'projects')));

echo "<h1>All kinds of Departments</h1><br>";
foreach($depts as $d){
    echo $d."<br>";
}

echo "<h1>All kinds of Projects</h1><br>";
foreach($prjcts as $d){
    echo $d."<br>";
}

// Incrementing the salary by 10% using array_map()

$employees = array_map(function($emp){
    if($emp['experience']>7){
        $emp['salary'] *= 1.01;
    }
    return $emp;
}, $employees);

echo "<h1>The Employee table after incrementing the salaries of people with an experiance of greater than 7 years</h1><br>";
printEmpTable($employees);

echo "<br><h1>The encoded JSON data</h1><br>";

$json = json_encode($employees, JSON_PRETTY_PRINT);

echo $json;

?>