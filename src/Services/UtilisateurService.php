<?php

namespace App\Services;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface as ValidatorValidatorInterface;
class UserService {
    function AddUser(EntityManagerInterface $entityMananger, Request $request ,UserPasswordEncoderInterface $encoder, $role, SerializerInterface $serializer,ValidatorValidatorInterface $validator) {
        $user = $request->request->all();
        $avatar = $request->files->get("avatar");
        $avatar = fopen($avatar->getRealPath(),"rb");
        $user["avatar"] = $avatar;
        $user = $serializer->denormalize($user,"App\Entity\Utilisateur",true);
        $errors= $validator->validate($user);
         if (count($errors))
         {
             $errors = $serializer->serialize($errors,"json");
             return new JsonResponse($errors,Response::HTTP_BAD_REQUEST,[],true);
         }
        $user->setisAuthorized(true);
        $password = $user->getPassword();
        $user->setPassword($encoder->encodePassword($user,$password));
        $entityMananger->persist($user);
        $entityMananger->flush();
        fclose($avatar);
        return $user;
    }
}