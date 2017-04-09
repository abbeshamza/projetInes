<?php
namespace AppBundle\Manager;
abstract class BaseManager {
    public function remove($entity) {
        $this->em->remove($entity);
    }
    public function persist($entity) {
        $this->em->persist($entity);
    }
    public function flush() {
        $this->em->flush();
    }
//    abstract protected function getRepository();
}