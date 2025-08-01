<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des participants</title>
</head>
<body>
  <?php if(isset($evenement)): ?>
  <h1>Participants pour l'événement : <?php echo e($evenement->titre); ?></h1>
<?php else: ?>
  <h1>Participants enregistrés</h1>
<?php endif; ?>
 <?php if(isset($evenement)): ?>
    <a href="<?php echo e(route('participants.create', ['evenementId' => $evenement->id])); ?>">
        <button type="button">Nouveau Participant</button>
    </a>
<?php endif; ?>

  <table border="1" cellpadding="8" cellspacing="0">
    <thead><!--titre des coolonnes=entete du tableau-->
      <tr><!--ligne(tr=row)-->
       <th>Nom</th><!--cellule titre-->
       <th>Prenom</th>
       <th>Email</th>
       <th>Profession</th>
       <?php if(!isset($evenement)): ?>
        <th>Evenement</th>
       <?php endif; ?>

       <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $participants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr><!--pour chaque particip commence nouvelle ligne-->
        <td><?php echo e($p->nom); ?></td>
        <td><?php echo e($p->prenom); ?></td>
        <td><?php echo e($p->email); ?></td>
        <td><?php echo e($p->profession); ?></td>
        <?php if(!isset($evenement)): ?>
         <td><?php echo e($p->evenement?->titre ?? 'Non défini'); ?></td>
        <?php endif; ?>

        <td>
          <!--bouton Modifier-->
          <a href="<?php echo e(route('participants.edit',$p->id)); ?>">Modifier</a><!--Lien pour modifier ce participant (va à edit)--> |
           <!-- Bouton Supprimer -->
          <form action="<?php echo e(route('participants.destroy',$p->id)); ?>"method="POST" style="display:inline-block;">
            <?php echo csrf_field(); ?><!--Protection contre les attaques CSRF-->
            <?php echo method_field('DELETE'); ?>
            <button type="submit" onclick="return confirm('confirmer la suppression ?')" class="btn btn-danger btn-sm">
              Supprimer</button>
            <!--tous ce qui est dans form action pour supprimer le particpant(button)-->
          </form>
        </td>  
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>



  
</body>
</html><?php /**PATH C:\Users\FATY\Desktop\projet-stage\resources\views/participants/index.blade.php ENDPATH**/ ?>