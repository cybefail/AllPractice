<?php
//ТЕМА
class User{
    private $name;
    public function construct($newName): void{
        if($newName){
            $this->name = $newName;
            return true;
        }
        return false;
    }
        public function setName($newName): mixed {
        return $this->$newName;
}
};
$user1 = new User(name: 'Вася');
$user1 = setName(newName: 'Петя');
?>
<p><?= $user1->name ?></p>