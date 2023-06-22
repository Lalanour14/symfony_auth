<?php

namespace App\Repository;
use App\Entity\Message;


class MessageRepository {
    

    public function persist(Message $message):void {
        $connection = Database::getConnection();
        $query = $connection->prepare('INSERT INTO message (content,id_user) VALUES (:content,:idUser)');
        $query->bindValue(':content', $message->getContent());
        $query->bindValue(':idUser', $message->getIdUser());
        $query->execute();

        $message->setId($connection->lastInsertId());
    }
    /**
     * @return Message[]
     */
    public function findAll():array{
        $list = [];
        $connection = Database::getConnection();
        $query = $connection->prepare('SELECT * FROM message');
        $query->execute();
        foreach ($query->fetchAll() as $line) {
            $list[] = new Message($line['content'], $line['id_user'], $line['id']);
        }
        return $list;
   }
}