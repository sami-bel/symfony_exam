<?php

namespace AppBundle\Contact;
use Symfony\Component\Validator\Constraints as Assert;

class Contact {

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=200)
     */
    private $name;
    /**
     * @Assert\Email()
     * @Assert\Length(max=200)
     */
    private $email;
    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=200)
     */
    private $subject;
    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=200)
     */
    private $message;
    private $contactedAt;


    /**
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getContactedAt()
    {
        return $this->contactedAt;
    }

    /**
     * @param mixed $contactedAt
     */
    public function setContactedAt($contactedAt)
    {
        $this->contactedAt = $contactedAt;
    }



}