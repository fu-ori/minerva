const { useState } = wp.element;
const { createRoot } = wp.element;

const MinervaBuilder = () => {
    const [blocks, setBlocks] = useState([]);

    const addBlock = (type) => {
        setBlocks([...blocks, { id: Date.now(), type }]);
    };

    return (
        <div>
            <h2>Minerva Builder</h2>
            <button onClick={() => addBlock("text")}>Adicionar Texto</button>
            <button onClick={() => addBlock("image")}>Adicionar Imagem</button>

            <div className="editor" style={{ border: "1px solid #ddd", padding: "10px", marginTop: "10px" }}>
                {blocks.map((block) => (
                    <div key={block.id} style={{ padding: "5px", borderBottom: "1px solid #ccc" }}>
                        {block.type === "text" ? "Bloco de Texto" : "Imagem [Placeholder]"}
                    </div>
                ))}
            </div>
        </div>
    );
};

document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("minerva-builder-app");
    if (container) {
        createRoot(container).render(<MinervaBuilder />);
    }
});
