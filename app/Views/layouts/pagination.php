<?php $pager->setSurroundCount(5) ?>

<nav class="container_base p-3" aria-label="Page navigation">
  <ul id="pagination" class="flex">
  <?php if ($pager->hasPrevious()) : ?>
    <li>
      <a class="base_button" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
        <span aria-hidden="true"><?= lang('Pager.first') ?></span>
      </a>
    </li>
    <li>
      <a class="base_button" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
        <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
      </a>
    </li>
  <?php endif ?>

    <div class="border-l border-gray-400 mx-1"></div>

  <?php foreach ($pager->links() as $link): ?>
    <li <?= $link['active'] ? 'class="font-bold border dark:bg-gray-700 dark:border-gray-900 bg-gray-200 border-gray-300 rounded-xl"' : '' ?>>
      <a class="base_button px-5" href="<?= $link['uri'] ?>">
        <?= $link['title'] ?>
      </a>
    </li>

    <div class="border-l border-gray-400 mx-1"></div>
  <?php endforeach ?>

  <?php if ($pager->hasNext()) : ?>
    <li>
      <a class="base_button" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
        <span aria-hidden="true"><?= lang('Pager.next') ?></span>
      </a>
    </li>
    <li>
      <a class="base_button" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
        <span aria-hidden="true"><?= lang('Pager.last') ?></span>
      </a>
    </li>
  <?php endif ?>
  </ul>
</nav>