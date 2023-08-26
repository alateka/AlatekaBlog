<?php $pager->setSurroundCount(5) ?>

<nav class="container_base p-3" aria-label="Page navigation">
  <ul class="flex">
  <?php if ($pager->hasPrevious()) : ?>
    <li>
      <a class="base_button" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pagination.first') ?>">
        <span aria-hidden="true"><?= lang('Pagination.first') ?></span>
      </a>
    </li>
    <li>
      <a class="base_button" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pagination.previous') ?>">
        <span aria-hidden="true"><?= lang('Pagination.previous') ?></span>
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
      <a class="base_button" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pagination.next') ?>">
        <span aria-hidden="true"><?= lang('Pagination.next') ?></span>
      </a>
    </li>
    <li>
      <a class="base_button" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pagination.last') ?>">
        <span aria-hidden="true"><?= lang('Pagination.last') ?></span>
      </a>
    </li>
  <?php endif ?>
  </ul>
</nav>