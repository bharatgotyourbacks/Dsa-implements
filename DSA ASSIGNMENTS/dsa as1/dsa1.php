<?php
//1)Implement the Stack data structureand its functionalities.

class Stack
{
    protected $stack;
    protected $capacity;

    public function __construct($capacity = 5)
    {
        // initialize the stack with an empty array
        $this->stack = array();
        // stack can only contain this many elements
        $this->capacity = $capacity;
    }

    public function push($element)
    {
        // check for stack overflow
        if (count($this->stack) < $this->capacity) {
            // prepend element to the start of the stack array
            array_unshift($this->stack, $element);
        } else {
            throw new RuntimeException('Stack overflow!!!');
        }
    }

    public function pop()
    {
        // check for stack underflow
        if (empty($this->stack)) {
            throw new RuntimeException('Stack underflow!!!');
        } else {
            // pop an element from the start of the stack array
            return array_shift($this->stack);
        }
    }

    public function peek()
    {
        return current($this->stack);
    }

    public function printStack()
    {
        print_r($this->stack);
    }
}

$stack = new Stack(3);

$stack->push(25);
$stack->printStack();

$stack->push(20);
$stack->printStack();

$removed_ele = $stack->pop();
print("Popped element: " . $removed_ele . "\n");
$stack->printStack();

$peeked_ele = $stack->peek();
print("Top element: " . $peeked_ele . "\n");

$stack->push(24);
$stack->push(31);
$stack->push(45);

//2)Implement the Queue data structure and its functionalities

class Queue
{
    protected $queue;
    protected $front;
    protected $rear;
    protected $capacity;

    public function __construct($capacity = 5)
    {
        // initialize the queue with an empty array
        $this->queue = array();

        // queue can only contain this many elements
        $this->capacity = $capacity;

        // initialize front and rear to -1
        $this->front = -1;
        $this->rear = -1;
    }

    public function enqueue($element)
    {
        if ($this->rear == $this->capacity) {
            print("Queue is full!!!\n");
        } else {
            // when the queue is empty
            if ($this->front == -1) {
                // initialization required for first queue element
                $this->front = $this->rear = 0;
            }
            $this->queue[$this->rear] = $element;
            $this->rear++;
        }
    }

    public function dequeue()
    {
        if ($this->front == $this->rear) {
            print("Queue is empty!!!\n");
        } else {
            if ($this->rear - $this->front == 1) {
                $this->front = $this->rear = -1;
            } else {
                $this->rear--;
            }
            return array_shift($this->queue);
        }
    }

    public function peek()
    {
        return $this->queue[$this->front];
    }

    public function printQueue()
    {
        print_r($this->queue);
    }
}

$queue = new Queue(3);
$queue->enqueue(10);
$queue->enqueue(20);
$queue->enqueue(30);
$queue->printQueue();
print("Dequeued element: " . $queue->dequeue() . "\n");
$queue->printQueue();
$queue->enqueue(40);
$queue->enqueue(50);

//3)Implement a Linked List

class Node
{
    public $data;
    public $next;

    public function __construct($item)
    {
        $this->data = $item;
        $this->next = null;
    }
}

/**
 * Class to represent a linked list
 */
class MyLinkedList
{
    public $head = null; // instance variable

    private static $count = 0; // static variable

    /**
     * Getter function for count of nodes
     *
     * @return int
     */
    public function getCount()
    {
        return self::$count;
    }

    /**
     * Insertion at the beginning of the linked list
     *
     * @param mixed $newItem
     * @return void
     */
    public function insertAtFirst($newItem)
    {
        if ($this->head === null) { // if the linked list is empty
            $this->head = new Node($newItem);
        } else { // when the linked list is non-empty
            $temp = new Node($newItem);
            $temp->next = $this->head;
            $this->head = $temp;
        }

        self::$count++;
    }

    public function insertAtLast($newItem)
    {
        if ($this->head === null) { // if the linked list is empty
            $this->head = new Node($newItem);
        } else { // when the linked list is non-empty
            $current = $this->head;

            while ($current->next != null) {
                $current = $current->next;
            } // after while loop terminates, current points to the last Node

            $current->next = new Node($newItem);
        }

        self::$count++;
    }

    /**
     * Function to insert a node at k-th index in the linked list
     * Note - index starts from zero
     *
     * @param mixed $item
     * @param int $index
     * @return void
     */
    public function insertAtKthIndex($item, $index)
    {
        if ($index == 0) {
            $this->insertAtFirst($item);
        } else {
            $node = new Node($item);
            $current = $this->head;
            $previous = $this->head;
            for ($i = 0; $i < $index; $i++) {
                $previous = $current;
                $current = $current->next;
            }
            $previous->next = $node;
            $node->next = $current;

            self::$count++;
        }
    }

    public function updateKthNode($newData, $pos)
    {
        if ($this->head === null) {
            $this->head = new Node($newData);
        } else {
            $current = $this->head;
            $currentPos = 1;
            while ($currentPos < $pos && $current != null) {
                $current = $current->next;
                $currentPos++;
            }
            $current->data = $newData;
        }
    }

    public function delete($item)
    {
        $current = $previous = $this->head;

        while ($current->data != $item) {
            $previous = $current;
            $current = $current->next;
        }

        // if you are deleting the first node of the linked list
        if ($current == $previous) {
            $this->head = $current->next;
        }

        $previous->next = $current->next;

        self::$count--;
    }

    public function printList()
    {
        $items = [];
        $current = $this->head;
        while ($current != null) {
            array_push($items, $current->data);
            $current = $current->next;
        }

        $str = '';
        foreach ($items as $item) {
            $str .= $item . '->';
        }

        echo $str;
        echo PHP_EOL;
    }
}

$my_list = new MyLinkedList();

$my_list->insertAtFirst(34);
$my_list->insertAtLast(41);
$my_list->printList();
$my_list->insertAtKthIndex(33, 1);
$my_list->printList();
$my_list->insertAtKthIndex(54, 3);
$my_list->printList();
$my_list->insertAtKthIndex(121, 3);
$my_list->printList();
$my_list->updateKthNode(74, 4);
$my_list->printList();
$my_list->delete(74);
$my_list->printList();

