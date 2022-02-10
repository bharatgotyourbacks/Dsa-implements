<?php
// 1)WAP to implement bubble sort to sort an array of numbers in ascending order

function bubbleSort($arr)
{
    $size = count($arr) - 1;
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size - $i; $j++) {
            $k = $j + 1;
            if ($arr[$k] < $arr[$j]) {
                // Swap the elements at j-th and k-th indices
                list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);
            }
        }
    }
    return $arr;
}

$sorted_array = bubbleSort(array(7, 3, 12, 10, 5));
print_r($sorted_array);

// 2)WAP to implement merge sort to sort an array of numbers in ascending order.

function merge_sort($my_array)
{
    if (count($my_array) == 1) return $my_array;
    $mid = count($my_array) / 2;
    $left = array_slice($my_array, 0, $mid);
    $right = array_slice($my_array, $mid);
    $left = merge_sort($left);
    $right = merge_sort($right);
    return merge($left, $right);
}

function merge($left, $right)
{
    $res = array();
    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] > $right[0]) {
            $res[] = $right[0];
            $right = array_slice($right, 1);
        } else {
            $res[] = $left[0];
            $left = array_slice($left, 1);
        }
    }
    while (count($left) > 0) {
        $res[] = $left[0];
        $left = array_slice($left, 1);
    }
    while (count($right) > 0) {
        $res[] = $right[0];
        $right = array_slice($right, 1);
    }
    return $res;
}

$test_array = merge_sort(array(100, 54, 7, 2, 5, 4, 1));
print_r($test_array);

// 3)WAP to sort the objects of a Student class in ascending order.
// The Student class has a constructor, getters, setters, and three data members: name, roll No, and age.

class Student
{
    private $name;
    private $rollNo;
    private $age;

    /**
     * Contructor with scalar type declaration
     *
     * @param string $name
     * @param integer $rollNo
     * @param integer $age
     */
    public function __construct(string $name, int $rollNo = -1, int $age = -1)
    {
        $this->name = $name;
        $this->rollNo = $rollNo;
        $this->age = $age;
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }

    /**
     * __toString() method with return type declaration
     *
     * @return string
     */
    public function __toString(): string
    {
        return "Student: $this->name, Roll No.: $this->rollNo, Age: $this->age";
    }

    static function sortByProperty($students, $property)
    {
        $size = count($students) - 1;
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size - $i; $j++) {
                $k = $j + 1;
                if ($students[$k]->$property > $students[$j]->$property) {
// Swap the elements at j-th and k-th indices
                    list($students[$j], $students[$k]) = array($students[$k], $students[$j]);
                }
            }
        }
        return $students;
    }
}

$student1 = new Student("Mickey", 5, 99);
$student2 = new Student("Donald", 6, 113);
$student3 = new Student("Goofy", 7, 56);

$students = array($student1, $student2, $student3);

print("Unsorted list of students:: \n");
print_r($students);

$students_sorted_desc_by_rollNo = Student::sortByProperty($students, "rollNo");
print("List of students sorted by roll no.:: \n");
print_r($students_sorted_desc_by_rollNo);

$students_sorted_desc_by_age = Student::sortByProperty($students, "age");
print("List of students sorted by age:: \n");
print_r($students_sorted_desc_by_age);

$students_sorted_desc_by_name = Student::sortByProperty($students, "name");
print("List of students sorted by name:: \n");
print_r($students_sorted_desc_by_name);
