function metaTags(inputId, metaParentClass) {

        $(`#${inputId}`).on('keyup', (e) => {
            const input = $(e.target).val();
            const tags = input.split(' ').map(tag => tag.trim()).filter(tag => tag !== '');
            const $metaParent = $(metaParentClass);
            $metaParent.empty();

            tags.forEach(tag => {
                const metaAppend = `<span class="badge badge-info bg-info ml-2 mr-2">${tag}</span>`;
                $metaParent.append(metaAppend);
            });
        });
}
