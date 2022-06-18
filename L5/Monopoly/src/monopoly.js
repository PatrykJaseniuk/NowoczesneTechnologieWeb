import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';

class Monopoly extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
        }
    }
    render() {
        return (
            <div>
                <h1>Monopoly</h1>
            </div>            
        );
    }
}

// ========================================

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(<Monopoly />);
