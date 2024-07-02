<?php
// src/Form/IncidentType.php
namespace App\Form;

use App\Entity\Incident;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IncidentType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
{
$builder
// autres champs...
->add('solutions', FileType::class, [
'label' => 'Upload Solution File',
'mapped' => false,
'required' => false,
]);
}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults([
'data_class' => Incident::class,
]);
}
}
