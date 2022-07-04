<?php

// namespace App\Services;

use App\Entity\Utilisateur;
use App\Repository\RoleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface as ValidatorValidatorInterface;
// class UserService {

//     private $entityMananger;
//     private $request;
//     private $encoder;
//     private $serializer;
//     private $validator;
//     private $imgService;
//     private $roleRep;
//     public function __construct( EntityManagerInterface $entityMananger, Request $request ,UserPasswordEncoderInterface $encoder,RoleRepository $roleRep, SerializerInterface $serializer,ValidatorValidatorInterface $validator,ImageService $imgService )
//     {
//         $this->$entityMananger=$entityMananger;
//         $this->$request=$request;
//         $this->$encoder=$encoder;
//         $this->$serializer=$serializer;
//         $this->$validator=$validator;
//         $this->$imgService=$imgService;
//         $this->roleRep=$roleRep;
//     }

//     function AddUser() {
//         $user = $this->request->request->all();
//         $avatar= $this->imgService -> getAvatar();
//         $user["avatar"] = $avatar;
//         unset($user['avatar']);
//         $role=$this->roleRep->find($user["role_id"]);
//         unset($user['avatar']);
//         $user = $this->serializer->denormalize($user,"App\Entity\Utilisateur",true);
//         $user->setRole($role);
//         $errors= $this->validator->validate($user);
//          if (count($errors))
//          {
//              $errors = $this->serializer->serialize($errors,"json");
//              return new JsonResponse($errors,Response::HTTP_BAD_REQUEST,[],true);
//          }
//         $password = $user->getPassword();
//         $user->setPassword($this->encoder->encodePassword($user,$password));
//         $this->entityMananger->persist($user);
//         $this->entityMananger->flush();
//         fclose($avatar);
//         return $user;
//     }
// }